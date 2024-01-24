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
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->integer('status')->default(\App\Enums\TaskStatusEnum::Pending->value);
            $table->timestamp('deadline')->nullable();
            $table->double('estimated_hours', 8, 2)->nullable();

            $table->foreignUuid('project_id')->references('id')->on('projects');
            $table->foreignId('created_user_id')->references('id')->on('users');
            $table->foreignId('assigned_user_id')->nullable()->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
