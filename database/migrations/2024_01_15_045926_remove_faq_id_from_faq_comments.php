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
            $table->dropForeign(['faq_question_id']); // Zorg ervoor dat je de juiste kolomnaam gebruikt
            $table->dropColumn('faq_question_id');   // Verwijder alleen als je ook de kolom wilt verwijderen
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
