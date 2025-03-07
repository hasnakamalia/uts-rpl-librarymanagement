<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique(); // Kolom email
            $table->string('phone');
            $table->string('membership_type');
            $table->string('address')->nullable();
            $table->timestamps();
        });
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {

        Schema::dropIfExists('members');
    }

};
