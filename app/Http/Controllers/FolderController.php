<?php

namespace App\Http\Controllers;

// Folderクラスを使うために追加
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;// 追加

class FolderController extends Controller
{
    //
    public function showCreateForm()
      {
          return view('folders/create');
      }

    // public function create(Request $request)
    public function create(CreateFolder $request)
      {
          // フォルダモデルのインスタンスを作成する
          $folder = new Folder();
          // タイトルに入力値を代入する
          $folder->title = $request->title;
          // インスタンスの状態をデータベースに書き込む
          $folder->save();

          return redirect()->route('tasks.index', [
              'id' => $folder->id,
          ]);
      }
}
