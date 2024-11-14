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
        Schema::create('tbl_hoandon', function (Blueprint $table) {
            $table->Increments('hoadon_id');
            $table->string('hoadon_name');
            $table->integer('customer_id');
            $table->string('hoadon_address');
            $table->string('hoadon_phone');
            $table->string('hoadon_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_hoandon');
    }
};
