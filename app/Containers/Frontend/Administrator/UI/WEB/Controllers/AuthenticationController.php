<?php

namespace App\Containers\Frontend\Administrator\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Actions\ForgotPasswordAction;
use App\Containers\AppSection\Authentication\Actions\ResetPasswordAction;
use App\Containers\AppSection\Authentication\Actions\WebLoginAction;
use App\Containers\AppSection\Authentication\Actions\WebLogoutAction;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\AppSection\Authentication\UI\API\Requests\ForgotPasswordRequest;
use App\Containers\AppSection\Authentication\UI\API\Requests\ResetPasswordRequest;
use App\Containers\AppSection\User\Actions\UpdateUserAdminPasswordAction;
use App\Containers\AppSection\User\Actions\UpdateUserAdminUsernameAction;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Authentication\LoginRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Authentication\LogoutRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Authentication\MyProfileRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Authentication\UpdatePasswordProfileRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Authentication\UpdateUsernameProfileRequest;
use App\Ship\Parents\Controllers\WebController;
use App\Ship\Parents\Exceptions\Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends WebController
{
    public function showLoginPage()
    {
        $page_title = "Ingreso";
        if (Auth::guard('web')->check()) {
            return redirect()->route('admin_show_index');
        }
        return view('frontend@administrator::authentication.login', [], compact('page_title'));
    }

    public function postLogin(LoginRequest $request): RedirectResponse
    {
        try {
            $result = app(WebLoginAction::class)->run($request);
        } catch (Exception $e) {
            return redirect()->route('admin_show_login')
                ->withInput(['email' => $request->email])->with('status', $e->getMessage());
        }
        return is_array($result) ? redirect()->route('admin_show_login')
            ->with($result) : redirect()->route('admin_show_index');
    }

    public function postLogout(LogoutRequest $request)
    {
        app(WebLogoutAction::class)->run();
        $request->session()->flush();
        return redirect()->route('admin_show_login');
    }

    public function myProfile(MyProfileRequest $request)
    {
        $page_title = "Mi Perfil";
        $user = app(GetAuthenticatedUserTask::class)->run();
        return view('frontend@administrator::authentication.myProfile', [
            'user' => $user
        ], compact('page_title'));
    }

    public function updatePasswordProfile(UpdatePasswordProfileRequest $request)
    {
        try {
            $user = app(GetAuthenticatedUserTask::class)->run();
            $user = app(UpdateUserAdminPasswordAction::class)->run($request);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function updateUsernameProfile(UpdateUsernameProfileRequest $request)
    {
        try {
            $user = app(GetAuthenticatedUserTask::class)->run();
            $user = app(UpdateUserAdminUsernameAction::class)->run($request);
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showForgotPasswordPage()
    {
        $page_title = "Olvidaste tu contraseña";
        if (Auth::guard('web')->check()) {
            return redirect()->route('admin_show_index');
        }
        return view('frontend@administrator::authentication.forgotPassword', [
            'reseturl' => url(route('admin_reset_password'))
        ], compact('page_title'));
    }

    public function postForgotPassword(ForgotPasswordRequest $request): RedirectResponse
    {
        try {
            app(ForgotPasswordAction::class)->run($request);
            return redirect()->route('admin_forgot_password')
                ->with('success', 'Se ha enviado un correo para restablecer su contraseña.');
        } catch (Exception $e) {
            return redirect()->route('admin_forgot_password')
                ->with('error', $e->getMessage());
        }
    }

    public function showResetPasswordPage()
    {
        $page_title = "Restablecer contraseña";
        if (Auth::guard('web')->check()) {
            return redirect()->route('admin_show_index');
        }
        return view('frontend@administrator::authentication.resetPassword', [], compact('page_title'));
    }

    public function postResetPassword(ResetPasswordRequest $request): RedirectResponse
    {
        try {
            app(ResetPasswordAction::class)->run($request);
            return redirect()->route('admin_reset_password')
                ->with(
                    'success',
                    'La contraseña ha sido restablecida con satisfactoriamente. Intente ingresar nuevamente'
                );
        } catch (Exception $e) {
            return redirect()->route('admin_reset_password')->with('error', $e->getMessage());
        }
    }
}
