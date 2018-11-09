<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/login';

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
        $messages = [
            'kode_pegawai.required' => 'Kode Pegawai Harus Diisi.',
            'kode_pegawai.unique' => 'Kode Pegawai Sudah Ada.',
            'name.required' => 'Nama Harus Diisi.',
            'email.required' => 'Email Harus Diisi.',
            'email.unique' => 'Email Sudah Ada.',
            'username.required' => 'Username Harus Diisi.',
            'username.unique' => 'Username Sudah Ada.',
            'password.request' => 'Password Harus Diisi.',
            'password.confirmed' => 'Password Tidak Sama, Silahkan Mengisi Password Ulang.',
            'password.min' => 'Password harus diisi minimal 6 karakter.'
        ];
        return Validator::make($data, [
            'kode_pegawai' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'status' => 'required|string|max:255',
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'kode_pegawai' => $data['kode_pegawai'],
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],
        ]);
    }
}
