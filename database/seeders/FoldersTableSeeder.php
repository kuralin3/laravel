<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// 追加
use DB;
//or
// use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = DB::table('users')->first();// ユーザと紐付けるため

        $titles = ['プライベート', '仕事', '旅行'];

        foreach ($titles as $title) {
            DB::table('folders')->insert([
                'title' => $title,

                'user_id' => $user->id, // ユーザと紐付けるため

                // 作成日と更新日には Carbon というライブラリを使って現在日時を入れています。
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
