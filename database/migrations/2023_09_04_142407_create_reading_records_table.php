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
        Schema::create('reading_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('student_id');
            $table->dateTime('datetime');
            $table->timestamps();

            $table->foreign('student_id')->references('id')
                ->on('students')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('book_id')->references('id')
                ->on('books')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reading_records');
    }
};
