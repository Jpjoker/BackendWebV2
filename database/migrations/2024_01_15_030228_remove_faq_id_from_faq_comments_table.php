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
            $table->dropForeign(['faq_id']);
            $table->dropColumn('faq_id');
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
