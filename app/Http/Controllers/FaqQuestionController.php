<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;
class FaqQuestionController extends Controller
{
    public function index()
    {
        $questions = FaqQuestion::with('category')->get();
        return view('admin.faq.questions.index', compact('questions'));
    }

    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.questions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'nullable|string'
        ]);
    
        FaqQuestion::create($request->only(['category_id', 'question', 'answer']));
    
        return redirect()->route('faq-questions.index')->with('success', 'Question created successfully.');
    }
    

    public function edit(FaqQuestion $faqQuestion)
    {
        $categories = FaqCategory::all(); // Fetch all categories
        return view('admin.faq.questions.edit', compact('faqQuestion', 'categories'));
    }
    

    public function update(Request $request, FaqQuestion $faqQuestion)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string',
            'answer' => 'nullable|string',
        ]);

        $faqQuestion->update($request->all());
        return redirect()->route('faq-questions.index');
    }

    public function destroy(FaqQuestion $faqQuestion)
    {
        // ... code to delete the question ...
        $faqQuestion->delete();
        return redirect()->route('faq-questions.index');
    }

    
    
}
