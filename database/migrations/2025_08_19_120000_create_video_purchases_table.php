<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('video_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('video_id')->constrained('videos')->onDelete('cascade');
            $table->decimal('price', 8, 2);
            $table->timestamps();
            $table->unique(['user_id','video_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_purchases');
    }
};
