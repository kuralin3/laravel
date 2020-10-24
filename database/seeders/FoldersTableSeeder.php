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
        $titles = ['プライベート', '仕事', '旅行'];

        foreach ($titles as $title) {
            DB::table('folders')->insert([
                'title' => $title,
                // 作成日と更新日には Carbon というライブラリを使って現在日時を入れています。
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
