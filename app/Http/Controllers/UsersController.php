<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    //confirma que o usuário precisa estar logado no sistema para acessar.
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {        
        $usuarios = User::sortable()->paginate(15); //confirmação do paginate para exibir apenas 10 itens por página, e o sortable ira fazer a ordenação.
        Paginator::useBootstrap(); //utilização do paginator.
        return view('usuario.lista', compact('usuarios')); //retorna a tela com os usuários do sistema.
    }

    
    public function create()
    {
        return view('usuario.formulario'); //exibe a view do formulário de usuários para adiciar um novo. 
    }

    //função reponsável por adicionar um novo usuário.
    public function store(Request $request)
    {
        $this->validate($request, [ //verifica as seguintes informações: 
            'name'=> 'required|string', //verifica se o nome digitado é um string.
            'email'=>'required|email|unique:users', //verifica se esse e-mail ja está cadastrado no sistema.
            'password'=>'required|string|min:8|max:15' //verifica se a senha digitada tem entre 8 e 15 digitos.
        ]);
        $user = new User(); //envias as informações do nome usuário para o model User. 
        $user = $user->fill($request->all());
        $user->password = bcrypt($request->password); //criptografa a senha.
        $user->save(); //salva as novas informações 
        $request->session()->flash('mensagem_sucesso', 'Usuário cadastrado com sucesso'); //exibe uma mensagem de sucesso ao cadastrar um novo usuário.
        return Redirect::to('usuario'); //retorna para a view 'usuario'.
    }

    //função responsável por exibir as informações do usuário selecionado.
    public function show($id)
    {
        $usuario = User::findOrFail($id); //buscar no bando o usuário pelo seu ID.
        return view('usuario.formulario', compact('usuario')); //exibe as informações desse usuário na view 'usuario.formulario'.
    }

    
    public function edit($id)
    {
        //
    }

    //função responsável por atualizar as informações do usuário.
    public function update(Request $request, $id)
    {
        $this->validate($request, [ //verifica as seguintes informações: 
            'name'=>'required|string', //verifica se o nome digitado é um string.
            'email'=>'required|email', //verifica se esse e-mail ja está cadastrado no sistema.
            'password'=>'required|string|min:8|max:15'  //verifica se a senha digitada tem entre 8 e 15 digitos.
        ]);
        $user = User::findOrFail($id); //buscar no bando o usuário pelo seu ID.
        $user->fill($request->all()); 
        if (empty($request->password)){ //verifca se o campo senha está vazio.
            $user->password = $request->original;
        } else{
            $user->password = bcrypt($request->password); //criptografa a senha.
        }
        $user->update(); //atualiza/salva as novas informações do usuário.
        $request->session()->flash('mensagem_sucesso', 'Usuário alterado com sucesso'); //exibe uma mensagem de usuário alterado com sucesso.
        return Redirect::to('usuario'); //retorna para a view 'usuario'.
    }

    //função responsável por excluir o usuário.
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id); //buscar no bando o usuário pelo seu ID. 
        $user->delete(); //remove o usuário.
        $request->session()->flash('mensagem_sucesso', 'Usuário removido com sucesso'); //exibe uma mensagem de usuário removido com sucesso.
        return Redirect::to('usuario'); //redireciona para a view 'usuario'.
    }
}
