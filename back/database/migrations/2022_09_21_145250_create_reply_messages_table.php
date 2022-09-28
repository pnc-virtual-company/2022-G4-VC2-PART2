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
        Schema::create('reply_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained()->onDelete("CASCADE");
            $table->foreignId("comment_id")->constrained()->onDelete("CASCADE");
            $table->foreignId("follow_up_id")->constrained()->onDelete("CASCADE");
            $table->string('reply_msg');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('reply_messages');
    }
};
