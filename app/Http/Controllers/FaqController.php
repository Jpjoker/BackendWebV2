<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqQuestion;
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
}
