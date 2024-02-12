<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('tenant_name');
            $table->string('domain');
            $table->unsignedBigInteger('tenant_admin')->nullable(); // Make it nullable
            $table->string('address');
            $table->string('database');
            $table->string('subscription');
            $table->timestamps();
            $table->json('data')->nullable();
            $table->foreign('tenant_admin')->references('id')->on('users')->onDelete('set null'); // Adjust onDelete action
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
}
