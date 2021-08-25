<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'pagamentos';

    protected $fillable = [
        'valor','datacompra',

    ];




    protected $hidden = [
        'created_at',
        'updated_at',
    ];



    public function reservas(){
        return $this->hasMany('App\models\Reserva','compra_id');
    }



    
    public function search($filter = null)
    {

        $results = $this->where(function($query) use($filter){
            if ($filter)
            { 
                $query->where('datacompra','LIKE', "%($filter)%");
            }


        })->paginate(10);

        return $results;

        

    }
}
