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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postblog_id'); // Verwijst naar de Postblog
            $table->unsignedBigInteger('user_id')->nullable(); // Optioneel: voor de gebruiker die de comment plaatst
            $table->text('content'); // De inhoud van de comment
            $table->timestamps();
        
            $table->foreign('postblog_id')->references('id')->on('postblogs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
