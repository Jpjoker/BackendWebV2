<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;
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



    public function aboutUs()
    {
        return view('home.aboutUs');
    }
    
    public function blogpage()
    {
        $postblogs = Postblog::all();
        return view('home.blogpage', compact('postblogs'));
    }

    public function faq()
    {
        $faqCategories = FaqCategory::with('questions')->get();

        // Debugging: Dump the categories to see if they are fetched correctly
       
    
        return view('home.faq', compact('faqCategories'));
    }

    public function submitUserQuestion(Request $request)
    {
        // Validate the request...

        // Process the user's question (e.g., save to database, send email, etc.)

        return redirect()->back()->with('message', 'Thank you for your question!');
    }
       

    public function services()
    {
        return view('home.services');
    }
}
