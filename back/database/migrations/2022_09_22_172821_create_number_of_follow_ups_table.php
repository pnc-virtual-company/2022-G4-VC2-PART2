<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_of_follow_ups', function (Blueprint $table) {
            $table->id();
            $table->foreignId("follow_up_id")->constrained()->onDelete("CASCADE");
            $table->foreignId("student_id")->constrained()->onDelete("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('number_of_follow_ups');
    }
};
