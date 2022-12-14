<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("CASCADE");
            $table->foreignId("student_id")->constrained()->onDelete("CASCADE");
            $table->string('closed')->default("No");
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('follow_ups');
    }
};
