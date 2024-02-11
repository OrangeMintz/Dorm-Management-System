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
        Schema::create('dorms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dorm_head');
            $table->string('dorm_name');
            $table->string('address');
            $table->integer('rooms');
            $table->timestamps();

            $table->foreign('dorm_head')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dorms');
    }
};
