<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Postblog;

use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $user=Auth()->user();

        $user_id = $user->id;
        $name = $user->id;
        $usertype = $user->usertype;
        



        $postblog = new Postblog;
        $postblog->title = $request->title;
        $postblog->description = $request->description;
        $postblog->post_status = 'actief';



        $postblog->user_id = $user_id;
        $postblog->name = $name;
        $postblog->usertype = $usertype;
        
        // deze code is om de image te uploaden voor de publice folder
        $image = $request->image;
        if($image){
            $imagename= time().'.'.$image->getClientOriginalExtension();
            // naar uw public folder gaan van blogimages
            $request->image->move('blogimages', $imagename);
    
            // deze voor de database
            $postblog->image = $imagename; // Hier is de ontbrekende puntkomma toegevoegd
    
        }
        
        $postblog->save();

        return redirect()->back()->with('success', 'Post created successfully.');
    }

    public function show_post()
    {
        $postblogs = Postblog::all();
        return view('admin.show_post', compact('postblogs'));
    }

    public function delete_post($id)
    {
        $postblog = Postblog::find($id);
        $postblog->delete();
        return redirect()->back()->with('success', 'Post deleted successfully.');
    }
}