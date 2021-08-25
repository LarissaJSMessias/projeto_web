<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Compra;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CompraController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Compra $compra)
    {
        $this->repository = $compra;
        $this->request = $request;
    }

    //retornar pagina de listagem de compra
    public function index(Request $request)
    {
       $registros = $this->repository->all();

        return view('compra.index'
          ,[
            'registros' => $registros,
        ]); 
    }

    //pagina para cadastrar novo compra
    public function new()
    {
        return view('compra.cadastrar');

    }

        //salvar registro de novo compra
    public function create(Request $request)
    {

        $data = $request->all();
        $data['datacompra'] = Carbon::createFromFormat('d/m/Y',$request['datacompra'])->format('Y-m-d');
        $this->repository->create($data);

        return redirect()->route('compra.listar')->with('success','Registro Cadastrado com sucesso!');
        //return view('compra.index');
    }

    //retorna o registro de compra para alteração dos dados
    public function update($id)
    {
        $registro = $this->repository->find($id);

        if(!$registro){
            return redirect()->back();
        }
        return view('compra.alterar', [
            'registro' => $registro,
        ]);
    }

    //retorna o registro de compra para excluir do banco de dados
    public function delete($id)
    {
        $registro = $this->repository->find($id);

        if(!$registro){
            return redirect()->back();
        }

        return view('compra.excluir', [
            'registro' => $registro,
        ]);
    }

    //retorna o registro para consulta
    public function view($id)
    {
        $registro = $this->repository->find($id);

        return view('compra.consultar', [
            'registro' => $registro 
        ]);
    }

    //alterar no banco o resgistro do compra - modificado pelo usuário - tela
    public function save(Request $request, $id)
    {

        $data = $request->all();
        $registro = $this->repository->find($id);
        $data['datacompra'] = Carbon::createFromFormat('d/m/Y',$request['datacompra'])->format('Y-m-d');
        $registro->update($data);
        //return view('compra.listar');
        return redirect()->route('compra.listar')->with('success','Registro Alterado com sucesso!');
    }

    //excluir no banco o registro do compra
    public function excluir( $id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('compra.listar')->with('success','Registro Excluído com sucesso!');
    }

    //cancela a operação do usuario
    public function cancel()
    {
        return redirect()->route('compra.listar');
    }

    //buscar
     public function search(Request $request){
        
        $filters = $request->all();

        $registros = $this->repository->search($request->nome);

        return view('compra.index', [
            'registros' => $registros,
            'filters' => $filters,
        ]);

    }

    public function home()
    {
        return view('compra.home');
    } 
}