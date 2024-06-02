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
  *   "date": "2024-05-31",
         "last_change_date": "2023-09-23",
         "supplier_article": "a_616264214",
         "tech_size": "s_296",
         "barcode": "7598020155706",
         "quantity": 0,
         "is_supply": 1,
         "is_realization": 0,
         "quantity_full": 2,
         "warehouse_name": "Коледино",
         "in_way_to_client": 1,
         "in_way_from_client": 1,
         "nm_id": 805659520,
         "subject": "subject_6881",
         "category": "category_03405",
         "brand": "brand_3093082",
         "sc_code": "7636-9876",
         "price": 2732,
         "discount": 15
  *
  *
  * */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('last_change_date');
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->string('barcode');
            $table->integer('quantity');
            $table->integer('is_supply')->nullable();
            $table->integer('is_realization');
            $table->integer('quantity_full');
            $table->string('warehouse_name');
            $table->integer('in_way_to_client');
            $table->integer('in_way_from_client')->nullable();
            $table->bigInteger('nm_id');
            $table->string('subject');
            $table->string('category');
            $table->string('sc_code');
            $table->bigInteger('price');
            $table->bigInteger('discount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
