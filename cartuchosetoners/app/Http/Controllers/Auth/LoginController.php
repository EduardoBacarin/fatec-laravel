<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request){
        $data = $request->only(['email', 'password', 'remember']);
        $validator = $this->validator($data);

        if ($validator->fails()){
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        if(Auth::attempt($data)){
            return redirect()->route('categorias');
        }else{
            $validator->errors()->add('password', 'E-mail ou senha inválidos');
            return redirect()->route('login')->withInput()->withErrors($validator);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'string', 'password', 'min:4']
        ]);
    }
}
