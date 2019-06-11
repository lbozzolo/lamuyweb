<?php

namespace Lamuy\Http\Controllers\Auth;

use Lamuy\Http\Controllers\Controller;
use Lamuy\Models\Medico;
use Lamuy\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('web');
    }

    public function loginMedicos(Request $request)
    {
        $this->validate($request, [
            'matricula'   => 'required',
            'password' => 'required|min:4'
        ]);

        $medico = Medico::where('matricula', '=', $request->matricula)->where('clave', '=', $request->password)->first();

        if (!$medico)
            return redirect()->back()->withErrors('Los datos ingresados no coinciden con nuestros registros');

        $user = User::where('matricula', '=', $medico->matricula)->first();

        if(!$user){
            $user = User::create([
                'name' => $medico->apynom,
                'matricula' => $medico->matricula,
                'email' => $medico->email,
                'password' => Hash::make($medico->clave)
            ]);
        }

        Auth::login($user);

        $redirect = (Auth::user()->isMedico())? 'liquidaciones.index' : 'admin';

        return redirect()->route($redirect);

    }
}
