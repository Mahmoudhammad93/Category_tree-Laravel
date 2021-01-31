<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Category;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function categories(){
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::all();

        // return $allCategories;
        if(count($categories) > 0 || count($allCategories) > 0){
            return response()->json(['categories' => $categories, 'allCategories' => $allCategories]);
        }else{
            return response()->json(['categories' => 'No Data Found', 'allCategories' => 'No Data Found']);
        }
    }
}
