<?php

namespace App\Http\Controllers\Dashboard\auth;

use App\Http\Requests\AdminLogin;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function view()
    {
        return view('dashboard.auth.login');
    }

    /**
     * Login Admin
     * @param Login $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(AdminLogin $request)
    {
        // Get Data Credentials Request
        $credentials = $this->credentials($request);
        // Check If Credentials Has Error
        if (!$credentials) {
            return $this->invalid($request);
        }
        // store remember in var if true or false
        $remember = $request->input('remember') ? true : false;
        if (!auth('admin')->attempt($credentials, $remember)) return $this->invalid($request);
        // dd("dasdasdsadsa");
        return redirect()->route('admin.home');
    }

    /**
     * Filter Member Credentials
     * @param $request
     * @return array|bool
     */
    private function credentials($request)
    {
        $inputs = $request->validated();

        if (!filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
            return ['email' => $inputs['email'], 'password' => $inputs['password']];
        } elseif (filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
            return ['email' => $inputs['email'], 'password' => $inputs['password']];
        }
        return false;
    }


    /**
     * Return MSG Error
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    private function invalid($request)
    {
        return back();
    }

    /**
     * Logout Admin
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        // dd(auth('admin')->user());
        if (auth('admin')->check()) {
            // dd(auth('admin')->user());
            auth('admin')->logout();
            request()->session()->invalidate();
        }
        return redirect(route('login'));
    }
}
