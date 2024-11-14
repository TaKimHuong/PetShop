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
        Schema::create('tbl_dathang', function (Blueprint $table) {
            $table->increments('dathang_id');
            $table->integer('customer_id');
            $table->integer('hoadon_id');
            $table->integer('payment_id');
            $table->float('tong_tien');
            $table->integer('dathang_status');
        

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_dathang');
    }
};
