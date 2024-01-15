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
        Schema::create('faq_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faq_question_id');
            $table->unsignedBigInteger('comment_id');
            $table->timestamps();

            $table->foreign('faq_question_id')->references('id')->on('faq_questions')->onDelete('cascade');
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');

            // $table->unsignedBigInteger('faq_question_id');
            // $table->unsignedBigInteger('faq_id');
            // $table->unsignedBigInteger('comment_id');
            // $table->timestamps();
        
            // $table->foreign('faq_id')->references('id')->on('faqs')->onDelete('cascade');
            // $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            // $table->foreign('faq_question_id')->references('id')->on('faq_questions')->onDelete('cascade');

            // $table->primary(['faq_question_id', 'comment_id']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_comments');
    }
};
