<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $freelanceur = User::create([
            'lastname' => 'LATE',
            'firstname' => 'Edem',
            'birthdate' =>'09/09/1989',
            'phone' => '45123256',
            'image' =>NULL,
            'sexe' =>'masculin',
            'online' =>'oui',
            'email' => 'late@late.com',
            'password' => Hash::make('password')
        ]);

        $admin = User::create([
            'lastname' => 'HOUENOU',
            'firstname' => 'James',
            'birthdate' =>'09/09/1999',
            'phone' => '877787878',
            'image' => NULL,
            'sexe' => 'masulin',
            'online' =>'non',
            'email' => 'james@james.com',
            'password' => Hash::make('password')
        ]);

        $client = User::create([
            'name' => 'ATTIOGBE',
            'firstname' => 'Simplice',
            'birthdate' =>'09/09/1999',
            'phone' => '969696969',
            'image' => NULL,
            'sexe' => 'masculin',
            'online' =>'non',
            'email' => 'attiogbe@attiogbe.com',
            'password' => Hash::make('password')
        ]);

        
        $adminRole = Role::where('name','admin')->first();
        $freelanceurRole = Role::where('name','freelanceur')->first();
        $clientRole = Role::where('name','client')->first();

        $admin->roles()->attach($adminRole);
        $freelanceur->roles()->attach($freelanceurRole);
        $client->roles()->attach($clientRole);
        

    }
}
