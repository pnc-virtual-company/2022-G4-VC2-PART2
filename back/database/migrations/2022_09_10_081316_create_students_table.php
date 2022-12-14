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
            $table->foreignId("user_id")->constrained()->onDelete("CASCADE");
            $table->foreignId("batch_id")->constrained()->onDelete("CASCADE");
            $table->string('if_follow_up')->default("No");
            $table->string('province');
            $table->string('NGO')->default("No");
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
