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
       Schema::create('rooms', function (Blueprint $table) {
    $table->id();

    $table->string('name');
    $table->text('description');

    $table->enum('difficulty', [
        'Beginner',
        'Intermediate',
        'Advanced'
    ])->default('Beginner');

    $table->timestamp('start_time')->nullable();
    $table->timestamp('end_time')->nullable();

    $table->boolean('is_active')->default(true);

    $table->foreignId('created_by')
        ->constrained('users')
        ->cascadeOnDelete();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
