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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('skills')->nullable();
            $table->string('company')->nullable();
            $table->decimal('salary', 10)->nullable();
            $table->string('job_title')->nullable();
            $table->string('location')->nullable();
            $table->enum('work_type', ['Remote', 'Hybrid', 'Onsite'])->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['Pending', 'Published'])->nullable();
            $table->string('image')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('qualification')->nullable();
            $table->text('benefits')->nullable();
            $table->enum('experience_level', ['Junior', 'Mid_level', 'Senior'])->nullable();
            $table->date('closed_date')->nullable();
            $table->unsignedBigInteger('category_id')->nullable()->index('category_id');
            $table->unsignedBigInteger('user_id')->nullable()->index('user_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
