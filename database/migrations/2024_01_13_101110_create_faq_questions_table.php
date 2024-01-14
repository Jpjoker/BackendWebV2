<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
     Schema::create('faq_questions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained('faq_categories');
        $table->string('question');
        $table->text('answer')->nullable();
       
        // Inside the `faq_questions` migration `up()` method
        $table->foreignId('user_id')->nullable()->constrained('users');
        $table->foreignId('created_by_user_id')->nullable()->constrained('users');
        $table->foreignId('updated_by_user_id')->nullable()->constrained('users');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_questions');
        
    }
};
