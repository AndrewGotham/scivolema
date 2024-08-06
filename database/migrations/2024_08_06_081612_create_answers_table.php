<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(\App\Models\Question::class)->constrained()->cascadeOnDelete();
            $table->longText('body');
            $table->mediumInteger('score');
            $table->boolean('best_answer');
            $table->enum('status', ['published','pending','rejected'])->default('published');
            $table->text('status_note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
