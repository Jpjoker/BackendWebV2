<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserQuestion;
use App\Models\FaqCategory;

class UserQuestionController extends Controller
{
    public function someMethod()
{
    $userQuestions = UserQuestion::all(); // Get all user questions
    // ... do something with the questions ...
    
}
public function faq()
{
    $faqCategories = FaqCategory::with('questions')->get();
    $userQuestions = UserQuestion::all(); // Or however you wish to retrieve them

    return view('faq', compact('faqCategories', 'userQuestions'));
}

public function submitUserQuestion(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'user_question' => 'required|string|max:1000', 
        'question' => 'required|string',
    'category_id' => 'required|exists:faq_categories,id',// Add any other necessary validation rules
    ]);

    // Create a new user question
    $question = UserQuestion::create($validated);

    // Save the question
    $question->save();

    // Redirect the user back to the page with a success message
    return redirect()->back()->with('success', 'Your question has been submitted.');
}

 // Ensure this model is included at the top

public function showFaq()
{
    $faqCategories = FaqCategory::with('questions')->get();
    $userQuestions = UserQuestion::all(); // Fetch all user questions

    return view('faq', compact('faqCategories', 'userQuestions'));
}


public function showFaqPage()
{
    $faqCategories = FaqCategory::with('questions')->get();
    $userQuestions = UserQuestion::all(); // Fetching user questions

    return view('faq', compact('faqCategories', 'userQuestions'));
}


}