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
        Schema::create('lendings', function (Blueprint $table) {
            $table->increments("id");
            $table->date("date");
            $table->integer("ammount");

            $table->integer("id_user")->unsigned();
            $table->foreign("id_user")->references("id")->
            on ("users")->OnDelete("cascade")->OnUpdate("cascade");

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
        Schema::dropIfExists('lendings');
    }
};
