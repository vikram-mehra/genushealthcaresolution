<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class ClientBlogControllers extends Controller
{
    public function Index() 
    {
        $blogs = Blog::whereStatus(1)->get();

        return view('/client/blog/blog', compact('blogs'));
    }
    public function BlogDeatils($name)
    {
        $blog = Blog::where(['status' => 1, 'heading' => $name])->first();
        $blogs = Blog::whereStatus(1)->get();
        
        return view('/client/blog/blog_details', compact('blog', 'blogs'));
    }
}
