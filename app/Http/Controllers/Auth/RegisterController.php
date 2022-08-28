<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'pass_number' => ['required', 'string', 'max:255'],
            // 'rank' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            // 'function' => [ 'required', 'string', 'max:255'],
            // 'platoon' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            // 'pass_number' => $data['pass_number'],
            // 'rank' => $data['rank'],
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            // 'function' => $data['function'],
            // 'platoon' => $data['platoon'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
