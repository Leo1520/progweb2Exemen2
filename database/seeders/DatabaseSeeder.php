<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin Taller',
            'email'    => 'admin@taller.com',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name'     => 'Mecanico Juan',
            'email'    => 'juan@taller.com',
            'password' => Hash::make('juan123'),
        ]);
    }
}
