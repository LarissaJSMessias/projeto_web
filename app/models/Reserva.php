<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'datareserva','horarioreserva',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function cliente(){
        return $this->belongsTo('App\models\Cliente','cliente_id');
    }


    public function compras(){
        return $this->belongsTo('App\models\Compra','compra_id');
    }


    public function voos(){
        return $this->belongsTo('App\models\Voo','voo_id');
    }


    public function search($filter = null)
    {

        $results = $this->where(function($query) use($filter){
            if ($filter)
            { 
                $query->where('id_reserva','LIKE', "%($filter)%");
            }


        })->paginate(10);

        return $results;

        

    }
}
