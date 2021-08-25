<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Voo;
use Carbon\Carbon;
use App\Http\Requests\VooRequest;

class VooController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Voo $voo )
    {
        $this->repository = $voo;
        $this->request = $request;
    }

    //retorna a pagina de listagem de voos
    public function index(Request $request)
    {
       $registros = $this->repository->paginate(10);

        return view('voo.index', [
            'registros' => $registros,
        ]);
    }

    //retorna a pagina para cadastrar um novo voo
    public function new()
    {
        return view('voo.incluir');
    }

    //salvar o registro de um novo voo
    public function create(VooRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('voo.listar')->with('success','Registro Cadastrado com sucesso!');;
        
    }

    //retorna o registro de um voo para a alteração dos dados
    public function update($id)
    {
        $registro = $this->repository->find($id);

        if(!$registro){
            return redirect()->back();
        }

        return view('voo.alterar', [
            'registro' => $registro,
        ]);
    }

    //retorna o registro de um voo para excluir do banco de dados
    public function delete($id)
    {
        $registro = $this->repository->find($id);

        if(!$registro){
            return redirect()->back();
        }

        return view('voo.excluir', [
            'registro' => $registro,
        ]);
    }

    //retorna o registro para consultar - ver o registro na tela
    public function consult($id)
    {
        $registro = $this->repository->find($id);

        if(!$registro){
            return redirect()->back();
        }

        return view('voo.consultar', [
            'registro' => $registro,
        ]);
    }

    //alterar no banco o registro do voo que modificado pelo usuario - tela
    public function save(VooRequest $request, $id)
    {
        $data = $request->all();

        $registro = $this->repository->find($id);
        
        $registro->update($data);
        
        return redirect()->route('voo.listar')->with('success','Registro Alterado com sucesso!');
    }

    //excluir no banco o registro do autor
    public function excluir(Request $request, $id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('voo.listar')->with('success','Registro Excluído com sucesso!');
    }

    //cancela a operação do usuario
    public function cancel()
    {
        return redirect()->route('voo.listar');
    }

    //buscar
    public function search(Request $request){
        
        $filters = $request->all();
        $registros = $this->repository->search($request->nome);
        return view('voo.index', [
            'registros' => $registros,
            'filters' => $filters,
        ]);

    }

    public function home()
    {
        return view('voo.incluir');
    }
}
