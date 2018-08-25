<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // INSERÇÕES BASE APÓS A MIGRAÇÃO
        \App\User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
            'api_token' => str_random(40)
        ]);
    }
}
