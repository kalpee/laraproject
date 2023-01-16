<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Http\Requests\CreateFolder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view("folders/create");
    }

    public function create(CreateFolder $request)
    {
        $logId = Auth::id();
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();
        // タイトルに入力値を代入する
        $folder->title = $request->title;
        // ユーザーのフォルダを取得する
        $folder->user_id = $logId;
        // インスタンスの状態をデータベースに書き込む
        $folder->save();

        return redirect()->route("tasks.index", [
            "id" => $logId,
        ]);
    }
}
