<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Postblog;
class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $postblog=Postblog::all();


            $usertype=Auth()->user()->usertype;
            if($usertype=='user')
            {
                return view('home.homepage', compact('postblog'));
            }
            else if($usertype=='admin')
            {
                return view('admin.adminhome');
            }
            else
            {
                return redirect()->back();
            }
         
        }

        
    }
    /*
    public function post()
    {
        return view('post');
    }
    */
    public function homepage()
    {
        $postblog=Postblog::all();
        return view('home.homepage', compact('postblog'));
    }

    public function post_details($id)
    {
        $postblog=Postblog::find($id);
        return view('home.post_details', compact('postblog'));
    }
    
   
}
