<?php

namespace App\Containers\AppSection\Authentication\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Classes\LoginFieldParser;
use App\Containers\AppSection\Authentication\Exceptions\LoginFailedException;
use App\Containers\AppSection\Authentication\Values\IncomingLoginField;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Authentication\LoginRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class WebLoginAction extends ParentAction
{
    /**
     * @throws IncorrectIdException
     */
    public function run(LoginRequest $request)
    {
        $sanitizedData = $request->sanitizeInput([
            ...array_keys(config('appSection-authentication.login.fields', ['email' => []])),
            'password',
            'remember' => false,
        ]);

        $loginFields = LoginFieldParser::extractAll($sanitizedData);
        $credentials = [];
        foreach ($loginFields as $loginField) {
            $credentials[$loginField->name] =
                static fn (Builder $query): Builder => $query
                    ->orWhereRaw("lower({$loginField->name}) = lower(?)", [$loginField->value]);
        }
        $credentials['password'] = $sanitizedData['password'];

        $loggedIn = Auth::guard('web')->attempt($credentials, $sanitizedData['remember']);


        if (! $loggedIn) {
            $errorResult = array_reduce(
                $loginFields,
                static fn (array $result, IncomingLoginField $loginField): array => [
                    'errors' => array_merge($result['errors'], [$loginField->name => __('auth.failed')]),
                    'fields' => array_merge($result['fields'], [$loginField->name]),
                ],
                ['errors' => [], 'fields' => []],
            );

            throw new LoginFailedException('Las credenciales son incorrectas.');
        }

        $user = Auth::guard('web')->user();

        if (! $user->hasAdminRole()) {
            Auth::guard('web')->logout();
            throw new LoginFailedException('El usuario no tiene un rol autorizado');
        }

        if (! $user->active) {
            Auth::guard('web')->logout();
            throw new LoginFailedException('El usuario no esta activo. Póngase en contacto con soporte.');
        }

        session()->regenerate();

        if (! $loggedIn) {
            Auth::guard('web')->logout();
            throw new LoginFailedException(
                implode(" | ", isset($errorResult) ? $errorResult['errors'] : '')
            );
        }

        return $user;
    }
}
