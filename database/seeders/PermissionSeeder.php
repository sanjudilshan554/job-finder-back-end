<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function __construct() {
        $this->permission = new Permission();
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'create_users',
            ],
            [
                'name' => 'update_users',
            ],
            [
                'name' => 'delete_users',
            ],
            [
                'name' => 'view_users',
            ],
            [
                'name' => 'read_users',
            ],
            [
                'name' => 'create_blog',
            ],
            [
                'name' => 'update_blog',
            ],
            [
                'name' => 'delete_blog',
            ],
            [
                'name' => 'view_blog',
            ],
            [
                'name' => 'read_blogs',
            ],
        ];

        foreach($permissions as $permission){
            $old_permission = $this->permission->where('name', $permission['name'])->first();
            if(!$old_permission){
                $this->permission->create($permission);
            }
        }
        
    }
}
