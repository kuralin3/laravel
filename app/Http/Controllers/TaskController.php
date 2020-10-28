<?php

namespace App\Http\Controllers;


// 追加
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Http\Requests\CreateTask;
// 追加しないとTarget class [App\Http\Controllers\EditTask] does not exist.エラー表示
use App\Http\Requests\EditTask;
// ★ Authクラスをインポートする
use Illuminate\Support\Facades\Auth;
>>>>>>> develop

class TaskController extends Controller
{
    //
<<<<<<< HEAD
    public function index(int $id)
    {
          // すべてのフォルダを取得する
          $folders = Folder::all();

          // 選ばれたフォルダを取得する
          $current_folder = Folder::find($id);

          // 選ばれたフォルダに紐づくタスクを取得する
          $tasks = $current_folder->tasks()->get();

          return view('tasks/index', [
              'folders' => $folders,
              'current_folder_id' => $current_folder->id,
              'tasks' => $tasks,
        ]);
    }
=======
    /**
     * タスク一覧
     * @param Folder $folder
     * @return \Illuminate\View\View
     */
    public function index(Folder $folder)
      {
            // すべてのフォルダを取得する
            // $folders = Folder::all();
            // ユーザーのフォルダを取得する
            $folders = Auth::user()->folders()->get();
            // 選ばれたフォルダを取得する
            // $current_folder = Folder::find($id);
            // if (is_null($current_folder)) {
            //     abort(404);
            // }
            // dd(Auth::user()->id);
            if (Auth::user()->id !== $folder->user_id) {
                abort(403);
            }
            // 選ばれたフォルダに紐づくタスクを取得する
            // $tasks = $current_folder->tasks()->get();
            $tasks = $folder->tasks()->get();
            // dd($folder->id);

            return view('tasks/index', [
                'folders' => $folders,
                'current_folder_id' => $folder->id,
                'tasks' => $tasks,
          ]);
      }
      /**
       * GET /folders/{id}/tasks/create
       */
      public function showCreateForm(Folder $folder)
      {
          return view('tasks/create', [
              'folder_id' => $folder->id
          ]);
      }

      public function create(Folder $folder, CreateTask $request)
      {
          // $current_folder = Folder::find($id);

          $task = new Task();
          $task->title = $request->title;
          $task->due_date = $request->due_date;

          $folder->tasks()->save($task);

          return redirect()->route('tasks.index', [
              'folder' => $folder->id,
          ]);
      }

      /**
       * GET /folders/{id}/tasks/{task_id}/edit
       */
      public function showEditForm(Folder $folder, Task $task)
      {
          // $task = Task::find($task_id);
          // if ($folder->id !== $task->folder_id) {
          //     abort(404);
          // }
          $this->checkRelation($folder, $task);

          return view('tasks/edit', [
              'task' => $task,
          ]);
      }

      public function edit(Folder $folder, Task $task, EditTask $request)
      {
          // 1
          // $task = Task::find($task_id);
          // if ($folder->id !== $task->folder_id) {
          //     abort(404);
          // }
          $this->checkRelation($folder, $task);
          // 2
          $task->title = $request->title;
          $task->status = $request->status;
          $task->due_date = $request->due_date;
          $task->save();

          // 3
          return redirect()->route('tasks.index', [
              'folder' => $task->folder_id,
          ]);
      }
      
      private function checkRelation(Folder $folder, Task $task)
      {
          if ($folder->id !== $task->folder_id) {
              abort(404);
          }
      }


>>>>>>> develop
}
