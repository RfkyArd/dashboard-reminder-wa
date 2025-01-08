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
        Schema::create('message_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reminder_id')->constrained('reminders')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['sent','failed']);
            $table->timestamp('sent_at')->nullable();
            $table->text('response')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_logs');
    }
};
