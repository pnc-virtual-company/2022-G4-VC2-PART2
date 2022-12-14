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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained()->onDelete("CASCADE");
            $table->foreignId("user_id")->constrained()->onDelete("CASCADE");
            $table->foreignId("follow_up_id")->constrained()->onDelete("CASCADE");
            $table->string("topic");
            $table->string("action")->default('normal');
            $table->string("content");
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
        Schema::dropIfExists('comments');
    }
};
