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
     *  {
            "g_number": "2562060457700785214",
            "date": "2023-05-31",
            "last_change_date": "2023-05-31",
            "supplier_article": "a_311596847",
            "tech_size": "s_296",
            "barcode": "7924835658819",
            "total_price": 2184,
            "discount_percent": 0,
            "is_supply": 0,
            "is_realization": 1,
            "promo_code_discount": 0,
            "warehouse_name": "Чехов",
            "country_name": "Россия",
            "oblast_okrug_name": "Сибирский федеральный округ",
            "region_name": "Томская область",
            "income_id": 10781801,
            "sale_id": "S5445409397",
            "odid": 9002885167367,
            "spp": 0,
            "for_pay": 1897.28,
            "finished_price": 1940,
            "price_with_disc": 2156,
            "nm_id": 922895134,
            "subject": "subject_1153",
            "category": "category_03405",
            "brand": "brand_7501118",
            "is_storno": 0
        },
     *
     *
     * */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('g_number');
            $table->date('date');
            $table->date('last_change_date');
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->string('barcode');
            $table->bigInteger('total_price');
            $table->integer('discount_percent');
            $table->integer('is_supply');
            $table->integer('is_realization');
            $table->integer('promo_code_discount')->nullable();
            $table->string('warehouse_name');
            $table->string('country_name');
            $table->string('oblast_okrug_name');
            $table->string('region_name');
            $table->bigInteger('income_id');
            $table->string('sale_id');
            $table->bigInteger('odid')->nullable();
            $table->integer('spp')->nullable();
            $table->float('for_pay')->nullable();
            $table->integer('finished_price')->nullable();
            $table->integer('price_with_disc')->nullable();
            $table->bigInteger('nm_id');
            $table->string('subject');
            $table->string('category');
            $table->string('brand');
            $table->integer('is_storno')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
