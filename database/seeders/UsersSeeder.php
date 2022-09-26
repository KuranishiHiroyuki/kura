<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            
                'name'    => 'test',
                'email' => 'test@example.com',
                'password' => 'password11',
                'role' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            
            'name'    => 'tarou',
            'email' => 'tarou@email.com',
            'password' => 'password11',
            'role' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    ]);
    }
}
