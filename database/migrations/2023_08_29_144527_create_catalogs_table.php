<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->date("date");
            $table->string("description");
            
            $table->integer("id_product")->unsigned();
            $table->foreign("id_product")->references("id")->
            on("products")->OnDelete("cascade")->OnUpdate("cascade");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
