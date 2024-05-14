<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Crear tabla de conversaciones
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        // Crear tabla de participantes de conversaciones
        Schema::create('conversation_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conversation_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Agregar campo conversation_id a la tabla de mensajes
        Schema::table('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('conversation_id')->nullable();
            $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversation_participants');
        Schema::dropIfExists('conversations');

        // Eliminar campo conversation_id de la tabla de mensajes
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['conversation_id']);
            $table->dropColumn('conversation_id');
        });
    }
};
