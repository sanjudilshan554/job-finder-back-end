<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'super_admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@123'),
        ]);
        
        $role = Role::where('name', 'admin')->first();

        if($role){
            $user->assignRole($role);
        }
    }
}
