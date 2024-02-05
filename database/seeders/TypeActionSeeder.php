<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypeActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeActions = [
            ['id' => '1', 'description' => 'Entrada de produtos'],
            ['id' => '2', 'description' => 'Saída de produtos'],            
        ];
        
        // Inserir os registros no banco de dados usando o modelo Eloquent
        foreach ($typeActions as $typeAction) {
            \App\Models\TypeAction::create($typeAction);
        }
    }
}
