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
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'customer_id')) {
                $table->foreignUuid('customer_id')->references('id')->on('customers')->onDelete('cascade');
            } else {
                $table->dropForeign(['customer_id']);
                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->foreignUuid('customer_id')->references('id')->on('customers');
        });
    }
};
