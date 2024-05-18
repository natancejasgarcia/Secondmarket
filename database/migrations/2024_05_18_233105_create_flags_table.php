<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlagsTable extends Migration
{
    public function up()
    {
        Schema::create('flags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // El usuario que recibe la bandera
            $table->unsignedBigInteger('flagged_by'); // El usuario que pone la bandera
            $table->enum('flag_type', ['green', 'red']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('flagged_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('flags');
    }
}
