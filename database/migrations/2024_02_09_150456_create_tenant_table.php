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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_name');
            $table->string('domain');
            $table->unsignedBigInteger('tenant_admin')->nullable(); // Make it nullable
            $table->string('address');
            $table->string('database');
            $table->string('subscription');
            $table->timestamps();
            $table->foreign('tenant_admin')->references('id')->on('users')->onDelete('set null'); // Adjust onDelete action
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
