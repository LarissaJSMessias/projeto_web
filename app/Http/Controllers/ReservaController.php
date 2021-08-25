<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\ReservaRequest;
use App\models\Reserva;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\models\Cliente;
use App\models\Voo;
use App\models\Compra;

class ReservaController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Reserva $reserva)
    {
        $this->repository = $reserva;
        $this->request = $request;
    }

    //retornar pagina de listagem de reserva
    public function index(Request $request)
    {
       $registros = $this->repository->all();

        return view('reserva.index'
          ,[
            'registros' => $registros,
        ]);
    }

    //pagina para cadastrar novo reserva
    public function new()
    {
        $clientes = Cliente::all();
        $voos = Voo::all();
        $compras = Compra::all();

        return view('reserva.cadastrar',[
            'clientes'=>$clientes,
            'voos'=>$voos,
            'compras'=>$compras,
        ]);

    }

        //salvar registro de novo reserva***********************************
    public function create(Request $request)
    {
        $data = $request->all();
        $data['data'] = Carbon::createFromFormat('d/m/Y',$request['data'])->format('Y-m-d');
        $this->repository->create($data);


        $clientes = Cliente::all();
        $voos = Voo::all();
        $compras = Compra::all();

        return redirect()->route('reserva.listar')->with('success','Registro Cadastrado com sucesso!');
        //return view('reserva.index');
    }

    //retorna o registro de reserva para alteração dos dados
    public function update($id)
    {

        $clientes = Cliente::all();
        $voos = Voo::all();
        $compras = Compra::all();


        $registro = $this->repository->find($id);

        if(!$registro){
            return redirect()->back();
        }
        return view('reserva.alterar', [
            'registro' => $registro,
            'clientes'=>$clientes,
            'voos'=>$voos,
            'compra'=>$compras,
        ]);
    }

    //retorna o registro de reserva para excluir do banco de dados
    public function delete($id)
    {
        $registro = $this->repository->find($id);
        $clientes = Cliente::all();
        $voos = Voo::all();
        $compras = Compra::all();

        if(!$registro){
            return redirect()->back();
        }

        return view('reserva.excluir', [
            'registro' => $registro,
            'clientes'=>$clientes,
            'voos'=>$voos,
            'compra'=>$compras,
        ]);
    }

    //retorna o registro para consulta
    public function view($id)
    {

        $registro = $this->repository->find($id);

        $clientes = Cliente::all();
        $voos = Voo::all();
        $compras = Compra::all();

        return view('reserva.consultar', [
            'registro' => $registro,
            'clientes'=>$clientes,
            'voos'=>$voos,
            'compra'=>$compras,
        ]);
    }

    //alterar no banco o resgistro do reserva - modificado pelo usuário - tela***************************************
    public function save(Request $request, $id)
    {


        $data = $request->all();
        $registro = $this->repository->find($id);
        $data['data'] = Carbon::createFromFormat('d/m/Y',$request['data'])->format('Y-m-d');
        $registro->update($data);

        //return view('reserva.listar');
        return redirect()->route('reserva.listar')->with('success','Registro Alterado com sucesso!');
    }

    //excluir no banco o registro do reserva
    public function excluir( $id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('reserva.listar')->with('success','Registro Excluído com sucesso!');
    }

    //cancela a operação do usuario
    public function cancel()
    {
        return redirect()->route('reserva.listar');
    }

    //buscar
     public function search(Request $request){
        
        $filters = $request->all();

        $registros = $this->repository->search($request->nome);

        return view('reserva.index', [
            'registros' => $registros,
            'filters' => $filters,
        ]);

    }

    public function home()
    {
        return view('reserva.home');
    } 
}
