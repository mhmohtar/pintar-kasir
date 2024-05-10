<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'nama' => 'direktur',
        	//'email' => 'admin7@gmail.com',
        	'nip' => 199008190,
        	'jabatan' => 'DIREKTUR',
            'password' => Hash::make('password'),
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'nama' => 'finance',
            //'email' => 'finance@gmail.com',
            'nip' => 199112050,
            'jabatan' => 'FINANCE',
            'password' => Hash::make('password'),
            'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'nama' => 'staff',
            //'email' => 'staff@gmail.com',
            'nip' => 199302101,
            'jabatan' => 'STAFF',
            'password' => Hash::make('password'),
            'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
