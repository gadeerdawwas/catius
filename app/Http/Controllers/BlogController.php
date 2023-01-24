<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::orderBy('id','desc')->paginate(10);
       return view('dashboard.blog.index',compact('blogs'));
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

        if ($request->has('image')) {
            $FileEx = $request->file('image')->getClientOriginalExtension();
            $image_name = time() . '_' . rand() . '.' . $FileEx;
            $request->file('image')->move(public_path('upload/blog'), $image_name);

        }

       $blogs=Blog::create([

        'title'=> $request->title ,
        'content'=> $request->content ,
        'image'=>  $image_name ,
       ]);

        return redirect()->route('admin.blogs.index')->with('success', 'تم إضافة المدونة بنجاح');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Services=Blog::find($id);

        $image_name =$Services->image;

        if ($request->has('image')) {
            $FileEx = $request->file('image')->getClientOriginalExtension();
            $image_name = time() . '_' . rand() . '.' . $FileEx;
            $request->file('image')->move(public_path('upload/blog'), $image_name);
        }else{
            $extension = explode('/',  $image_name);
            $image_name = end($extension);
       }

       $services_id=Blog::find($id)->update([


        'title'=> $request->title ,
        'content'=> $request->content ,
        'image'=>  $image_name ,

       ]);

        return redirect()->route('admin.blogs.index')->with('success', 'تم نعديل مدونة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return redirect()->back()->with('success', 'تم عملية الحذف  بنجاح');
    }
}
