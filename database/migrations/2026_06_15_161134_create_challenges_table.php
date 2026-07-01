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
       Schema::create('challenges', function (Blueprint $table) {

    $table->id();

    $table->foreignId('room_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->string('title');

    $table->longText('description');

    $table->enum('category', [
        'XSS',
        'SQLI',
        'CSRF',
        'CRYPTO',
        'FORENSICS',
        'LINUX',
        'OSINT',
        'FILE_UPLOAD'
    ]);

    $table->enum('difficulty', [
        'Easy',
        'Medium',
        'Hard'
    ]);

    $table->integer('points')->default(100);

    // Hash ya flag
    $table->string('flag');

    $table->text('hint')->nullable();

    $table->string('attachment')->nullable();

    $table->boolean('is_active')->default(true);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
