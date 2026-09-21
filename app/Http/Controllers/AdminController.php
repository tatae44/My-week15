<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\blog;

class AdminController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function blog2() {
    $blog2 = blog :: paginate(5);
    return view("blog2", compact("blog2"));
    }
    function about2(){
        $name = "tanakit";
    $date = "6 กรกฎาคม 2026";

    return view("about2", compact("name", "date"));

    }
    function create(){
        return view('form');
    }
    function insert(Request $request){
        $request->validate(
            [
                "title" => "required|max:255",
                "content" => "required",
            ],[
                "title.required" => "กรุณาระบุชื่อบทความ",
                "title.max" => "ชื่อบทความต้องไม่เกิน 255 ตัวอักษร",
                "content.required" => "กรุณาระบุเนื้อหาบทความ",
            ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'created_at' => now(),
            'updated_at' => now(),
        ];

       blog::insert($data);

        return redirect()->route('blog2')->with('success', 'บันทึกบทความเรียบร้อยแล้ว');
    }
    function delete($id){
        blog::find($id)->delete();
        return redirect()->back();    
    }
    function chang($id){
       $blog = blog:: find($id);
       $data=['status'=>$blog->status];
       if($blog->status ==1){

        $data=['status'=>0];
    }else{
        $data=['status'=>1];
    }
       blog::find($id)->update($data);
      return redirect()->back();
    }
    function edit($id){
        $blog = blog::find($id);
        return view('edit',compact('blog'));
    }
    function update(Request $request,$id){
        $request->validate(
            [
                "title" => "required|max:255",
                "content" => "required",
            ],[
                "title.required" => "กรุณาระบุชื่อบทความ",
                "title.max" => "ชื่อบทความต้องไม่เกิน 255 ตัวอักษร",
                "content.required" => "กรุณาระบุเนื้อหาบทความ",
            ]);
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];
        blog::find($id)->update($data);
        return redirect('author/blog2');
}
}