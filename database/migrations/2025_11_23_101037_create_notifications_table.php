<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');     // receiver
            $table->unsignedBigInteger('by');          // actor (liked by / comment by)
            $table->string('type'); // follow, like, comment
            $table->foreignId('post_id')->nullable()->constrained('posts')->cascadeOnDelete();
            $table->foreignId('comment_id')->nullable()->constrained('comments')->cascadeOnDelete();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('by')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
