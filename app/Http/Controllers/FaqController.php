<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqQuestion;
use App\Models\Faq;
use App\Models\Comment;
use App\Models\FaqCategory;
class FaqController extends Controller
{
    public function submitUserQuestion(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'user_question' => 'required|string', 
            'question' => 'required|string',
        'category_id' => 'required|exists:faq_categories,id',// Add any other necessary validation rules
        ]);

   
        $question=FaqQuestion::create($validated);

    
        $question->save();
        return redirect()->back()->with('success', 'Your question has been submitted.');
    }



    public function storeComment(Request $request, $faq_id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $faq = Faq::findOrFail($faq_id);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->id();
        
        // Voeg de comment toe aan de FAQ
        $faq->comments()->save($comment);

        return back()->with('success', 'Commentaar succesvol geplaatst.');
    }


    public function index()
    {
        $faqCategories = FaqCategory::with('questions.comments')->get();

        return view('home.faq', compact('faqCategories'));
    }

    // test
    public function showFaqs()
    {
       
        $faqCategories = FaqCategory::with('questions.comments')->get();

        return view('home.faq', compact('faqCategories'));
    }

}
