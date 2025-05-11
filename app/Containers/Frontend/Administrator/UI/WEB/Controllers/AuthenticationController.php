<?php

namespace App\Containers\Frontend\Administrator\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Actions\WebLoginAction;
use App\Containers\AppSection\Authentication\Actions\WebLogoutAction;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Authentication\LoginRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Authentication\LogoutRequest;
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
}
