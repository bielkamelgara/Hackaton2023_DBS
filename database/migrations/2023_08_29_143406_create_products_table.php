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
        Schema::create('products', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("description");
            $table->string("price");
            $table->char("size", 5)->nullable();
            $table->string("color")->nullable();
            $table->string("avilable");
            $table->integer("ammount")->nullable();
            $table->string("photo")->nullable();
            $table->string("status");

            $table->integer("id_user")->unsigned();
            $table->foreign("id_user")->references("id")->
            on("users")->onDelete("cascade")->onUpdate("cascade");

            $table->integer("id_sector")->unsigned();
            $table->foreign("id_sector")->references("id")->
            on("sectors")->OnDelete("cascade")->OnUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
