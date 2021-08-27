<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'said',
                'email' => 'said@said',
                'password'  => bcrypt('01230123'),
                'pending' => '1',
                'admin' => '0',

            ],
            [
                'name' => 'said1',
                'email' => 'said1@said1',
                'password'  => bcrypt('01230123'),
                'pending' => '0',
                'admin' => '1',

            ]
        ]);
    }
}