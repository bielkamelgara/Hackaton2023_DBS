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
        Schema::create('memberships', function (Blueprint $table) {
            $table->increments("id");
            $table->string("payment", 6);
            $table->string("ccn", 22);
            $table->date("duration");
            $table->string("password");

            $table->integer("id_pay")->unsigned();
            $table->foreign("id_pay")->references("id")->
            on("payments")-> onDelete("cascade")->onUpdate("cascade");

            $table->integer("id_user")->unsigned();
            $table->foreign("id_user")->references("id")->
            on("users")->onDelete("cascade")->OnUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
