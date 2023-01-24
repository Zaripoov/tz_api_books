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
        Schema::create(table: 'book_authors', callback: function (Blueprint $table) {
            $table->id();
            $table->string(column: 'surname', length: 20);
            $table->string(column: 'name', length: 15);
            $table->string(column: 'patronymic', length: 25)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'book_authors');
    }
};
