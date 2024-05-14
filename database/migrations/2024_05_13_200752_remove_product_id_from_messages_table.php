<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveProductIdFromMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            // Eliminar la restricción de clave foránea primero
            $table->dropForeign(['product_id']);
            // Luego eliminar la columna
            $table->dropColumn('product_id');
        });
    }

    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            // Cuando se revierte la migración, agregar nuevamente la columna
            $table->unsignedBigInteger('product_id')->nullable();
            // Y la restricción de clave foránea
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
}
