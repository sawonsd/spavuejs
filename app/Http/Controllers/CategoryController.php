<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'categories' => $categories
        ],200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => slugify($request->name),
            'status' => 1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::where('slug',$slug)->first();

        return response()->json(['category' => $category],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = Category::find($request->id);

        $category->name = $request->name;
        $category->slug = slugify($request->name);
        $category->status = 1;

        if($category->save()){

            $success = true;
        }else{
            $success = false;
        }

        return response()->json(['success' => $success],200);
        

 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);

        $categories->delete();
    }

    public function reomveItems(request $request)
    {

        $sl = 0;
        foreach ($request->data as $id) {
            $category = Category::find($id);
            $category->delete();
            $sl++;
        }

        $success = $sl > 0 ? true : false;

        return response()->json(['success' => $success, 'total' => $sl],200);
    }


    public function statusChange(request $request)
    {

           if($request->status==0){

                $data=array();
                $data['status']=1;
                DB::table('categories')->where('id',$request->id)->update($data);
           }else{
            $data=array();
                $data['status']=0;
                DB::table('categories')->where('id',$request->id)->update($data);
           }

          





    }
}
