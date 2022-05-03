<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function showTags(){

        $tags=Tag::paginate();
        return view('admin.tags.tags')->with([
            'tags'=>$tags
        ]);

    }
}
