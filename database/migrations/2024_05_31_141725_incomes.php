<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

/*
 *
 *             "income_id": 12550236,
            "number": "",
            "date": "2023-06-02",
            "last_change_date": "2023-06-02",
            "supplier_article": "a_326224204",
            "tech_size": "s_296",
            "barcode": "6805580460421",
            "quantity": 4,
            "total_price": 0,
            "date_close": "2023-06-02",
            "warehouse_name": "",
            "nm_id": 27513264,
            "status": "Принято"
 *
 *
 * */

    public function up(): void
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('last_change_date');
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->string('barcode');
            $table->integer('quantity');
            $table->string('number')->nullable();
            $table->date('date_close');
            $table->string('warehouse_name');
            $table->bigInteger('nm_id');
            $table->string('status');
            $table->bigInteger('total_price');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
