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


    // best 
    public function storeComment(Request $request, $faq_id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $faq = Faq::findOrFail($faq_id);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->id();
        

        $faq->comments()->save($comment);

        return back()->with('success', 'Commentaar succesvol geplaatst.');
    }
    // In je FaqController of een relevante controller
   
    //test 2
    // public function storeComment(Request $request, $faqQuestionId)
    // {
    //     $validated = $request->validate([
    //         'content' => 'required|string',
    //     ]);

    //     $comment = new \App\Models\Comment();
    //     $comment->content = $request->content;
    //     $comment->user_id = auth()->id();
    //     $comment->save();

    //     $faqComment = new \App\Models\FaqComment();
    //     $faqComment->faq_question_id = $faqQuestionId;
    //     $faqComment->comment_id = $comment->id;
    //     $faqComment->save();

    //     return back()->with('success', 'Comment geplaatst');
    // }

    // test 3
    // public function storeComment(Request $request, $faqQuestionId)
    // {
    //     $request->validate([
    //         'content' => 'required|string',
    //     ]);
    
    //     $faqQuestion = \App\Models\FaqQuestion::findOrFail($faqQuestionId);
    //     $comment = new \App\Models\Comment();
    //     $comment->content = $request->content;
    //     $comment->user_id = auth()->id();
        
    //     // Sla het commentaar direct op de vraag op
    //     $faqQuestion->comments()->save($comment);
    
    //     return back()->with('success', 'Commentaar succesvol geplaatst.');
    // }
    
    


    public function index()
    {
        $faqCategories = FaqCategory::with('questions.comments')->get();
        return view('home.faq', compact('faqCategories'));
    }
    

    // test
    // public function showFaqs()
    // {
       
    //     $faqCategories = FaqCategory::with('questions.comments')->get();

    //     return view('home.faq', compact('faqCategories'));
    // }

}
