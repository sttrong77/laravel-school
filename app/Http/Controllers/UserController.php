<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateProfileUserRequest;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user){
      $this->user = $user;
    }

    public function logout(){
      Auth::logout();

      return redirect()
        ->route('home');
    }

    public function register(){
      return view('school.user.register');
    }

    public function registring(RegisterUserRequest $request){
      $dataForm = $request->all();
      $password = $dataForm['password'];//senha sem criptografia
      $dataForm['password'] = bcrypt($dataForm['password']); //recebe ele mesmo criptografado

      if($request->hasFile('image')){
        $image = $request->file('image');

        $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();//composicao nome imagem.

        $dataForm['image'] = $nameImage;//preenche campo imagem com o nome da mesma

        $upload = $image->storeAs('users', $nameImage);

        if(!$upload){
          return redirect()->back()->with(['errors'=>'Falha ao realizar upload']);
        }
      }

      $insert = $this->user->create($dataForm);

      if($insert){
        if(Auth::attempt(['email'=>$dataForm['email'], 'password'=> $password ]) )//já tenta logar logo
          return redirect()->route('profile');
        else
          return redirect('/login');
      } else{
        return redirect()->back()->with(['errors'=>'Falha ao cadastrar']);
      }

    }

    public function profile(){
      $title = 'Meu Perfil';
      return view('school.user.profile',compact('title'));
    }

    public function profileUpdate(UpdateProfileUserRequest $request){
      $dataForm = $request->all();

      $user = $this->user->find(auth()->user()->id);//id do user

      if($dataForm['password'] != '')//se existir senha
        $dataForm['passoword'] = bcrypt($dataForm['passoword']);//criptografa
      else
        unset($dataForm['password']);//trata se n tiver atualizacao senha

      if($request->hasFile('image')){
          $image = $request->file('image');

          if($user->image !=null)//se usuario já tem uma imagem
            $nameImage = $user->image;//pega nome da img do banco
          else
            $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();//composicao nome imagem.

          $dataForm['image'] = $nameImage;//preenche campo imagem com o nome da mesma

          $upload = $image->storeAs('users', $nameImage);

          if(!$upload)
            return redirect()->back()->with(['errors'=>'Falha ao realizar upload']);

        }

      $update = $user->update($dataForm);

      //Verifica se foi atualizado
      if($update){
        return redirect()->back()->with(['success'=>'Perfil atualizado com sucesso']);
      } else{
        return redirect()->back()->with(['errors'=>'Falha ao cadastrar']);
      }

    }
}
