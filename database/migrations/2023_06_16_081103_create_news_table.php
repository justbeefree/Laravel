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
        Schema::create('news', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->timestamps();

            $table->timestamp('published_at')->nullable();


            $table->string('name');
            $table->string('preview_text');
            $table->longText('detail_text');
            $table->string('images')->nullable();
            $table->boolean('active')->default(true);

            $table->foreignId('category_id')->constrained();
            $table->foreignId('source_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
