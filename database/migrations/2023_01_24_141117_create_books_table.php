<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(table: 'books', callback: function (Blueprint $table) {
            $table->id();
            $table->string(column: 'title', length: 100);
            $table->bigInteger(column: 'isbn')->unique();
            $table->integer(column: 'year');
            /*$table->integer(column: 'author_id');
            $table->foreign(columns: 'author_id')->references(columns: 'id')->on(table: 'book_authors');*/
            $table->foreignId('author_id')
                ->constrained(table: 'book_authors')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'books');
    }
};
