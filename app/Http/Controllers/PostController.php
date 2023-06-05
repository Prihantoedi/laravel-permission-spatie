<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct(){
        // $this->middleware('permission:view posts', ['only' => ['publish']]);
        $this->middleware('permission:publish posts', ['only' => ['publish']]); // if you give the same function to different permission, then only the last permission is used. Other permission is abandoned / ignored.
        // $this->middleware('permission:unpublish posts', ['only' => ['unpublish']]);
    }

    // public function index()

    public function publish(int $id){
        echo "post berhasil di publish";
    }

    public function unpublish(int $id){
        echo "post berhasil di unpublish";
    }
}
