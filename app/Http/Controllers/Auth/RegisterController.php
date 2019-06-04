<?php

namespace App\Http\Controllers\Auth;

use App\Model\Agencia;
use App\Model\Cargo;
use App\Model\Estado;
use App\Model\Funcao;
use App\Model\Municipio;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            'primeiroNome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showRegistrationForm()
    {
        $cargos = Cargo::all();
        $agencias = Agencia::all();
        $funcoes = Funcao::all();
        $municipios = Municipio::all();
        $estados = Estado::all();
        return view('auth.register', compact('cargos', 'agencias', 'funcoes', 'municipios', 'estados'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {



        return User::create($data);

        /*[
            'primeiroNome' => $data['primeiroNome'],
            'ultimoNome' => $data['ultimoNome'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'foto' => $data['foto'],
            'cargo_id' => $data['cargo_id'],
            'funcao_id' => $data['funcao_id'],
            'agencia_id' => $data['agencia_id'],
            'dataNascimento' => $data['dataNascimento'],
            'matricula' => $data['matricula'],
            'dataAdmissao' => $data['dataAdmissao'],
            'endereco' => $data['endereco'],
            'numero' => $data['numero'],
            'complemento' => $data['complemento'],
            'bairro' => $data['bairro'],
            'CEP' => $data['CEP'],
            'municipio_id' => $data['municipio_id'],
            'telefone' => $data['telefone'],
            'celular' => $data['celular'],
            'ativo' => true,
                ]*/

    }
}
