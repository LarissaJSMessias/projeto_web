<?php

use Illuminate\Database\Seeder;
use App\models\Cliente;

class ClienteSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Cliente $registro)
    {
        $registro->create([
            'nome' => 'Ana Maria Silva Santos',
            'cpf' => '47630238886',
            'telefone' => '14981954220',
            'email' => 'anamaria@gmail.com',

        ]);

        $registro->create([
            'nome' => 'Luiz Ricardo Pereira',
            'cpf' => '4762345676',
            'telefone' => '14982345',
            'email' => 'luizrp@gmail.com',

        ]);

        $registro->create([
            'nome' => 'João Pedro Barbosa',
            'cpf' => '4756789098',
            'telefone' => '345678900',
            'email' => 'barbosajoao@gmail.com',

        ]);

    }
}
