<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('author');
        $table->string('genre');
        $table->year('publication_year');
        $table->string('isbn')->default('N/A');
        $table->integer('copies_available')->default(1);
        $table->timestamps();
    });
}

};
