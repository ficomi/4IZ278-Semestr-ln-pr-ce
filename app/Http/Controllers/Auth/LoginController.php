<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Socialite;

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
    /*
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('facebook')->redirect();
    }

    /*
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
        if($request->has('code')){
            $userSocialite = Socialite::with('facebook')->user();
            $findUser = User::where('email', $userSocialite->email)->first();
            if ($findUser) {
                Auth::login($findUser);
            } else {
                $user = User::create([
                    'name' => $userSocialite['name'],
                    'email' => $userSocialite['email'],
                ]);
                $user->shoppingcart()->create();
                Auth::login($user);
            }

            return redirect()->route('home');
        } else {

            return redirect()->route('home')->with('error','Chyba: Nepodařilo se přihlásit pomocí Facebooku.');
        }
    }
}
