<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
{
    // Log::info('Validation data:', $data);

    $messages = [
        'password.confirmed' => 'The passwords do not match.',
        'email.unique' => 'A user with this email already exists.',
    ];

    $passwordValidator = Validator::make($data, [
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ], $messages);

    if ($passwordValidator->fails()) {
        throw new \Illuminate\Validation\ValidationException($passwordValidator);
    }

    $validator = Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['required', 'string', 'min:10', 'max:10'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ], $messages);

    if ($validator->fails()) {
        throw new \Illuminate\Validation\ValidationException($validator);
    }
    return $validator;
}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        Log::info('Creating user:', $data);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        $user->sendEmailVerificationNotification();

        return $user;

        // Log::info('User created successfully.', ['user_id' => $user->id]);
    }

protected function registered(Request $request, $user)
{
    // Log::info('User registered successfully.', ['user_id' => $user->id]);
    // Mail::to($user->email)->send(new VerificationEmail($user));

    return redirect($this->redirectPath())->with('success', [
        'message' => 'Verification link sent to your email.',
        'duration' => 3000,
    ]);;
}
}
