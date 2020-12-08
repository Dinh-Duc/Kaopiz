<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function blog(Request $request)
    {
        $searchText = $request->input('search');

        $isDate = Carbon::hasFormat($searchText,'Y-m-d');

        $posts = DB::table('posts');



        if ($isDate){
            $posts->whereDate('create_at',$searchText);
        }else {
            $posts->where('title', 'LIKE', "%{$searchText}%")
            ->orwhere('content','LIKE', "%{$searchText}%");
        }

        $posts = $posts->paginate(10);


        return view('blog', ['posts'=>$posts]);
    }
}
