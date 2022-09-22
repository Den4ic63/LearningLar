<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'Admin',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Role::create([
            'name'=>'Manager',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Role::create([
            'name'=>'worker',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Role::create([
            'name'=>'client',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
