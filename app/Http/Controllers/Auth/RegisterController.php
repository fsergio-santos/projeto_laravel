,<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{

    private $repository;

    public function __construct(User $usuario)
    {
        //$this->middleware('guest');
        $this->repository = $usuario;
    }

 $request->validate([
            'email' => 'required|string|email|max:255',
            'password'=> 'required|string|min:6',
        ],
        [
            'required'  => 'O :attribute é obrigatório.',
        ]);

    protected function registrar(Request $request)
    {
 
        $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255',
             'password'=> 'required|string|min:6',
             'password_confirmation'=> 'required|string|min:6|same:password',
             'sexo'=>'required',
        ]);

        $usuario = $this->repository->where('email',$request->email)->first();
    
        if ($usuario){
            return redirect()->route('usuario.registrar')->with('fail','Usuário já está cadastrado!');
        }
        

        $usuario = new User([
            'name' => $request['name'],
            'email' => $request['email'],
            'sexo' => $request['sexo'],
            'profile_pic' => $request->sexo=='M' ? 'boy.png' : 'girl.png',
            'password' => Hash::make($request['password']),
        ]);

        
        if ($usuario->save()) {
            //$this->repository->sendVerificationEmail($usuario);
        };
        return redirect()->route('usuario.registrar')->with('success','Registro gravado com sucesso, verifique sua conta de E-mail!');
    }

    public function verifyAccount(Request $request){
    
        $user = $this->repository->where('remember_token', $request['token'])->first();
        if (isset($user)) {
            $user->remember_token = null;
            $user->is_active = true;
            $user->email_verified_at = Carbon::now();
            $user->save();
            return redirect()->route('page.login')->with('success','Você já validou sua conta ou link de verificação expirado!');
        }
        return redirect()->route('page.login')->with('fail','Você já validou sua conta ou link de verificação está expirado!');
    }

    

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
        ]);
  
        $user = $this->repository->where('email', $request->email)->first();
        if ($user) {
            $acao = $this->repository->requestPasswordReset($user->email);
            if ($acao) {
                return redirect()->route('page.login')->with('success','E-mail enviado no seu endereço eletrônico');
            }
        }
        return redirect()->route('page.login')->with('fail','Aconteceu um erro inesperado, fale com o Administrador!');
    }  


    public function showResetPasswordPage(Request $request)
    {
        $token = $request->token;
        return view('auth.reset_password')->with('token', $token);
    }


    public function resetPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required|between:6,255|confirmed',
            'password_confirmation' => 'required '
        ]);
       
        $tokenData = DB::table('password_resets')->where('token', $request->reset_token)->first();
        if (!$tokenData) {
            return redirect()->route('reset.password')->with('fail','Token Inválido!');
        }


        $user = User::where('email', $tokenData->email)->first();

        $user->password = bcrypt($request->password);
        $user->update();
        
        DB::table('password_resets')->where('email', $user->email)->delete();

        return redirect()->route('page.login')->with('success','Senha Alterada com sucesso!');

    }


    public function mailpage(){
        return view('auth.check_reset_email');
    }

    public function index(){
        return view('auth.register');
    }

}
