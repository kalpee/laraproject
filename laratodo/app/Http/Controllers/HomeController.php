<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $current_folder = Folder::where("user_id", $id)->get();

        if ($current_folder->empty()) {
            return redirect()->route("tasks.index", [
                "id" => $id,
            ]);
        } else {
            return view("home");
        }
    }
}
