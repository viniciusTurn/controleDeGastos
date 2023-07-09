<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TbTypeActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TbTypeAction::factory(3)->create();
    }
}
