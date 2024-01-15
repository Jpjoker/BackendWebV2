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
        Schema::table('faq_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('faq_question_id')->nullable();
            $table->foreign('faq_question_id')->references('id')->on('faq_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faq_comments', function (Blueprint $table) {
            //
        });
    }
};