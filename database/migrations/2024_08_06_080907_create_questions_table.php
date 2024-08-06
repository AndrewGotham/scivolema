<?php

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Language::class)->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique()->index();
            $table->longText('body');
            $table->unsignedMediumInteger('views')->default(0);
            $table->mediumInteger('score')->default(0);
            $table->json('tags')->nullable();
            $table->enum('status', ['published','pending','rejected'])->default('published');
            $table->text('status_note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
