<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Postblog;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{

    public function destroy($commentId)
    {   
        
        // Log::info('User Type: ' . auth()->user()->usertype);
        // Log::info('Is Admin: ' . (auth()->user()->isAdmin() ? 'Yes' : 'No'));

       
            $comment = Comment::findOrFail($commentId);
        
            // Controleer of de ingelogde gebruiker de auteur van de comment is
            if (!auth()->check() || auth()->user()->id != $comment->user_id) {
                return back()->with('error', 'Je hebt geen toestemming om deze comment te verwijderen.');
            }
        
            $comment->delete();
            return back()->with('success', 'Comment succesvol verwijderd.');
        
        
        // oude code
            // $comment = Comment::findOrFail($commentId);
            // $comment->delete();
            // return back()->with('success', 'Comment successfully deleted.');
    }



    public function store(Request $request, $postblog_id)
    {
        if (!auth()->check()) {
            return back()->with('error', 'Je moet ingelogd zijn om een comment te plaatsen.');
        }

        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'postblog_id' => $postblog_id,
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Commentaar succesvol geplaatst.');
    }


}   
