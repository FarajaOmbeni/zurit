<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user_budgetplanner';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function GoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Find user by Google ID
        $finduser = User::where('google_id', $user->id)->first();

        if ($finduser) {
            // If user is found, log them in
            Auth::login($finduser);
        } else {
            // Check if a user with the same email already exists
            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {
                // Update the existing user's Google ID
                $existingUser->update([
                    'google_id' => $user->id,
                ]);

                // Log in the existing user
                Auth::login($existingUser);
            } else {
                // Create a new user
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                ]);

                Auth::login($newUser);
            }
        }

        return redirect('user_budgetplanner');
    }

    protected function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->input('email');

        Session::put('name', $email);

        if (Auth::attempt($credentials)) {
            $user_role = Auth::user()->role;

            switch ($user_role) {
                case 0:
                    return redirect('user_budgetplanner');
                case 1:
                    return redirect('/editor');
                case 2:
                    return redirect('/admin');
                default:
                    Auth::logout();
                    return redirect('/login')->with('error', 'Ooops! Something went wrong!');
            }
        } else {
            return redirect('/login')->withErrors([
                'message' => 'Wrong username Or password!',
                'duration' => 3000,
            ]);
        }
    }
}
