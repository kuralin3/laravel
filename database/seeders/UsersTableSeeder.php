<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;// 追加
use Illuminate\Support\Facades\DB;// 追加

class UsersTableSeeder extends Seeder
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
            'name' => 'test',
            'email' => 'dummy@email.com',
            'password' => bcrypt('test1234'),// 暗号化
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
