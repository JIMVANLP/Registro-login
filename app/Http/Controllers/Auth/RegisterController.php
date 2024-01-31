<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Session;

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
    protected $redirectTo = '/home';

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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:20', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response'=>function($atribute, $value, $fail){
                $secretkey =config('services.recaptcha.secret');
                $capcha= $value;
                $ip= $_SERVER['REMOTE_ADDR'];

                $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$capcha&remoteip=$ip");

                $atributos = json_decode($respuesta);
                if (!$atributos->success)
                {
                    Session::flash('g-recaptcha-response' , 'Favor de marcar el recaptcha');
                    Session::flash('alert-class' , 'alert-danger');
                    $fail($atribute.'google reCaptcha failed');
                }
            }
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *

     *
     * @param  array  $data
     * @return \App\Models\User
     */

     /*Funcion para crear usuario*/
    protected function create(array $data)
    {
        /* Validar si es el primer usuario sera admin */

            $usuarios=DB::table('users')->where('rol','Admin')->value('rol');
            if (empty($usuarios))
            {
                return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'rol'=>'Admin',
                ]);
            }else
            {

                return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'rol'=>'user',
                ]);
            }


    }
}
