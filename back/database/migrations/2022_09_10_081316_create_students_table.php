<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("CASCADE")->nullable();
            $table->foreignId("batch_id")->constrained()->onDelete("CASCADE")->nullable();
            $table->string('if_follow_up');
            $table->string('province');
            $table->string('NGO');
            $table->string('class');
            $table->integer('year');
            $table->timestamps();
        });

    }


    public function down()
    {
        Schema::dropIfExists('students');
    }
};
