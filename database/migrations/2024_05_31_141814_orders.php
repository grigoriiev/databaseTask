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
     * g_number": "96353712836225677110",
            "date": "2024-05-30 08:43:06",
            "last_change_date": "2024-05-30 11:00:24",
            "supplier_article": "a_752661802",
            "tech_size": "s_296",
            "barcode": "9581162935374",
            "total_price": 1858,
            "discount_percent": 0,
            "warehouse_name": "Казань",
            "oblast": "Республика Бурятия",
            "income_id": 19273056,
            "odid": null,
            "nm_id": 347272131,
            "subject": "subject_7025",
            "category": "category_03405",
            "brand": "brand_1943385",
            "is_cancel": 0,
            "cancel_dt": null
        },
     *
     *
     * */
    public function up(): void
    {


        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('g_number');
            $table->dateTime('date');
            $table->dateTime('last_change_date');
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->string('barcode');
            $table->string('subject')->nullable();
            $table->string('brand');
            $table->bigInteger('income_id');
            $table->string('warehouse_name');
            $table->bigInteger('nm_id');
            $table->string('category');
            $table->bigInteger('total_price');
            $table->integer('discount_percent');
            $table->integer('is_cancel');
            $table->string('cancel_dt')->nullable();
            $table->bigInteger('odid')->nullable();
            $table->string('oblast');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
