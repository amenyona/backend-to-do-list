<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
            'name'=>'admin',
            'description' =>'Compte administrateur'
        ]);

        Role::create([
            'name'=>'client',
            'description' =>'Compte client'
        ]);
        
        Role::create([
            'name' => 'freelanceur',
            'description' => 'compte freelanceur'
        ]);

        
    }
}
