<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;


class CategoryController extends Controller

{

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function manageCategory()

    {

        $categories = Category::where('parent_id', '=', 0)->get();

        $allCategories = Category::all();

        // return $allCategories;

        return view('categoryTreeview',compact('categories','allCategories'));
        return response()->json(['categories' => $categories, 'allCategories' => $allCategories]);

    }


    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function addCategory(Request $request)

    {

        $this->validate($request, [

            'title' => 'required',

        ]);

        $input = $request->all();

        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Category::create($input);

        return back()->with('success', 'New Category added successfully.');

    }


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