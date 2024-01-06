<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Postblog;

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

        $postblog = new Postblog;
        $postblog->title = $request->title;
        $postblog->description = $request->description;
        
        // deze code is om de image te uploaden voor de publice folder
        $image = $request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        // naar uw public folder gaan van blogimages
        $request->image->move('blogimages', $imagename);

        // deze voor de database
        $postblog->image = $imagename; // Hier is de ontbrekende puntkomma toegevoegd

        $postblog->save();

        return redirect()->back(); /*route('post_page')->with('success', 'Post created successfully.');*/
    }
}