<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        if (isset($data['account'])) {
            $id = $data['account'];
            return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $id,
                'password' => 'required|confirmed|min:6',
            ]);
        }
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function create(array $data)
    {
        if (isset($data['account'])) {
            $user = User::where('email', $data['email'])->first();
            $user->password = bcrypt($data['password']);
            $user->name = $data['name'];
            $user->save();
            return $user;
        } else {
            return User::Create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'points' => 25
            ]);
        }
    }
}
