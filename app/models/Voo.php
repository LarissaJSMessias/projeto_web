<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Voo extends Model
{
    protected $table = 'quartos';

    protected $fillable = [
        'numero','valor', 'saida', 'chegada', 'tempovoo',
        'aeroportosaida', 'aeroportochegada',

    ];



    protected $hidden = [
        'created_at',
        'updated_at',
    ];



    public function reservas(){
        return $this->hasMany('App\models\Reserva','voo_id');
    }



    public function search($filter = null)
    {

        $results = $this->where(function($query) use($filter){
            if ($filter)
            { 
                $query->where('numero','LIKE', "%($filter)%");
            }


        })->paginate(10);

        return $results;

        

    }
}
