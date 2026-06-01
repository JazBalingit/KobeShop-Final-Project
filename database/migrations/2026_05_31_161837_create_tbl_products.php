<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id('ProductID');
            $table->unsignedBigInteger('StaffID');
            $table->string('ProductName', 200);
            $table->integer('ProductQty')->default(0);
            $table->decimal('ProductPrice', 10, 2)->default(0.00);
            $table->timestamps();

            $table->foreign('StaffID')
                  ->references('StaffID')
                  ->on('tbl_users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_products');
    }
};