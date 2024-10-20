<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    protected $role;

    public function __construct() {
        $this->role = new Role();
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [

            [
                'name' => 'super_admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user',
                'guard_name' => 'web',
            ]

        ];

        foreach($roles as $role){
            $old_roles = $this->role->where('name', $role['name'])->first();
            if(!$old_roles){
                $this->role->create($role);
            }
        }
    }
}
