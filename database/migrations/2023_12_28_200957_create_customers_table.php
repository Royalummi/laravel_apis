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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('profile_image')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();

            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tik_tok')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('google_reviews')->nullable();
            $table->string('website')->nullable();
            $table->string('dummy')->nullable();
            $table->string('address_link')->nullable();
            $table->string('gallery_link1')->nullable();
            $table->string('gallery_link2')->nullable();
            $table->string('gallery_link3')->nullable();
            $table->string('gallery_link4')->nullable();
            $table->string('gallery_link5')->nullable();
            $table->string('pdf')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
