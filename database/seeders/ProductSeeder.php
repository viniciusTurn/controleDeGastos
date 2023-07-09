<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeActions = \App\Models\TbTypeAction::all(); 
            
        \App\Models\Product::factory()->count(10)->create()->each(function ($product) use ($typeActions) {
            $typeAction = $typeActions->random(); // Seleciona uma ação aleatória            
            $product->action_code = $typeAction->id; // Atribui o ID da ação à coluna de chave estrangeira
            $product->save();
        });
    }
}
