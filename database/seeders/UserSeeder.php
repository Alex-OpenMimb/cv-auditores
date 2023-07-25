<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'Administrador',
            'email'             => 'admin@email.com',
            'role_id'           =>  Role::handleRoleName('Administrador')->first()['id'],
            'password'          =>  Hash::make('1234567890'),
        ]);

        User::create([
            'name'              => 'Auditor',
            'email'             => 'auditor@email.com',
            'role_id'           =>  Role::handleRoleName('Redactor')->first()['id'],
            'password'          =>  Hash::make('1234567890'),
        ]);

        // User::create([
        //     'name'              => 'Coordinador',
        //     'email'             => 'coordinador@email.com',
        //     'role_id'           =>  Role::handleRoleName('Administrador')->first()['id'],
        //     'password'          =>  Hash::make('1234567890'),
        // ]);
    }
}
