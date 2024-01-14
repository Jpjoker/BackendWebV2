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
            $comment->delete();
            return back()->with('success', 'Comment successfully deleted.');
    }
}
