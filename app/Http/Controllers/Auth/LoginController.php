<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Socialite;
use GuzzleHttp\Exception\ClientException;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        /*
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->user();
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->email)->first()) {
            return $this->authAndRedirect($user); // Login y redirección
        } else {
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = User::create([
                'name' => $social_user->name,
                'email' => $social_user->email,
            ]);

            return $this->authAndRedirect($user); // Login y redirección
        }
        */

        try {
            // Obtenemos los datos del usuario
            $social_user = Socialite::driver($provider)->user();
            // Comprobamos si el usuario ya existe
            $user = User::where('email', $social_user->email)->firstOrFail();
            if ($user) {
                return $this->authAndRedirect($user); // Login y redirección
            }
        } catch (Exception | ClientException $e) {
            return redirect()->to('/login')->withErrors(['email' => "No existe el email en nuestra base de datos"]);
        }

    }

    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);

        return redirect()->to('/home');
    }

}
