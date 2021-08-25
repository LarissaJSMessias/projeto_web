<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Cliente;
use Carbon\Carbon;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    private $repository;
    protected $request;
    private $out;

    public function __construct(Request $request, Cliente $cliente )
    {
        $this->repository = $cliente;
        $this->request = $request;
        $this->out = $out;
    }

    //retorna a pagina de listagem de clientes
    // paginaAtual 0..n
    // pageSize    5,10,15,20,25...
    // dir/sort    classificar  ->ascendente, descendente
    // props       "campos da tabela"-> id, nome, email... 
    // search      nome, email, cpf ... 
    public function index(Request $request)
    {
       // $this->out->writeln("Hello from Terminal");

      // $registros = $this->repository->paginate(10);


      $paginaAtual = $request->get('paginaAtual') ?  $request->get('paginaAtual') : 1;  
      $pageSize = $request->get('pageSize') ? $request->get('pageSize') : 5;
      $dir = $request->get('dir') ? $request->get('dir') : 'asc';  
      $props = $request->get('props') ? $request->get('props') :'id'; 
      $search = $request->get('search') ? $request->get('search') : ''; 

      //fazer o import do DB
      if(empty($search)){
         $query = DB:: table('cliente')->select('*')->orderBy($props, $dir);
    
      }else {
        $query = DB:: table('cliente')->where('nome','LIKE', "%".$search.'%')
                                   // ->orWhere('email','LIKE', "%".$search.'%')
                                   // ->orWhere('telefone','LIKE', "%".$search.'%')
                                    ->orderBy($props, $dir);
         }

      $total = $query->count();

      $registros = $query->offset(($paginaAtual-1) * $pageSize)-> limit($pageSize)->get() ;
     

        return response()->json([
           'data'=> $registros,
           'paginaAtual'=> $paginaAtual-1,
           'pageSize'=> $pageSize,
           'paginaFim' =>ceil($total/$pageSize),  
           'total' => $total,
            ]);
        }


    //salvar o registro de um novo cliente
    public function create(ClienteRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return response()->json(['mensagem'=>'cadastro realizado com sucesso!']);
    }

    //retorna o registro de um cliente para a alteração dos dados
    public function update($id)
    {
        $registro = $this->repository->find($id);

        if(!$registro){
            return response()->json(['mensagem' => 'registro não localizado']);
        }

        return response()->json(['cliente' => $registro]);
    }

    //retorna o registro de um cliente para excluir do banco de dados
    public function delete($id)
    {
        $registro = $this->repository->find($id);

        if(!$registro){
            return redirect()->back();
        }

        return view('cliente.excluir', [
            'registro' => $registro,
        ]);
    }

    //retorna o registro para consultar - ver o registro na tela
    public function view($id)
    {
        $registro = $this->repository->find($id);

        if(!$registro){
            return redirect()->back();
        }

        return view('cliente.consultar', [
            'registro' => $registro,
        ]);
    }

    //alterar no banco o registro do cliente que modificado pelo usuario - tela
    public function save(ClienteRequest $request, $id)
    {
        $data = $request->all();

        $registro = $this->repository->find($id);
        
        $registro->update($data);
        
     return response()->json(['mensagem' => "alteração realizada com sucesso"]);
   
    }

    //excluir no banco o registro do autor
    public function excluir(Request $request, $id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('cliente.listar');
    }

   
}