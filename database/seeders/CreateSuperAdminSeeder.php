<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin = User::create([
            'name'=> 'admin',
            'second_name'=> 'admin',
            'email'=>'a@mail.com',
            'password'=>Hash::make('00000000'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'photo'=>null

        ]);

       Role::create([
           'name'=>'SuperAdmin',
           'created_at'=>Carbon::now(),
           'updated_at'=>Carbon::now()
       ]);

       $admin->assignRole('SuperAdmin');

    }
}
