<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    public function index()
    {
        $blog2= Blog::OrderbyDesc('id')->where('status',true)->get();

        return view("index", compact('blog2'));
    }
    public function detail($id)
    {
          $blog2= Blog::find($id);
          return view("detail", compact('blog2'));
    }
    
}
