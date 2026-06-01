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
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->id('StaffID');
            $table->string('LastName', 100);
            $table->string('FirstName', 100);
            $table->string('MiddleName', 100)->nullable();
            $table->string('Email', 200)->unique();
            $table->string('Gender', 20)->nullable();
            $table->string('Password', 200);
            $table->string('Role', 50)->default('staff');
            $table->string('UserProfile', 255)->nullable();
            $table->string('Bio', 255)->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_users');
    }
};
