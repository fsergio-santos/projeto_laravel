<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    private $repository;
    
    public function __construct(User $user)
    {
        //$this->middleware('guest')->except('logout');
        $this->repository = $user;
    }


    public function login(LoginRequest $request){

        $email = $request->email;
        $password = $request->password;

        $user = $this->repository->where('email', $email)->first();

        if ($user){
            if (Auth::check() || ($user && Hash::check($password, $user->password))){
                Auth::login($user);
                if ( $user->is_active == 1) {
                    return redirect()->route('home');
                } else {
                    return redirect()->route('page.login')->with('fail','Verifique sua conta em seu e-mail!');
                }   
            } else {
                return redirect()->route('page.login')->with('fail','Senha inválida!');  
            }
        } else {
            return redirect()->route('page.login')->with('fail','Usuário não encontrado!');     
        }
       
        return redirect()->route('page.login')->with('fail','Falha no Login, Tente novamente!');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('page.login');
    }


    public function carregaLogin(){
        return view('auth.login');
    }

    
    


}
