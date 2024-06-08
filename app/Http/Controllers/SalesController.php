<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SalesController extends Controller
{
    public function index(): string
    {
        set_time_limit(0);
        $flag = true;
        $i = 0;
        $timeInMinute = time() + 60; //60 seconds
        while ($flag) {
            $i++;
            $response = Http::get("http://89.108.115.241:6969/api/sales?dateFrom=2020-05-31&dateTo=2029-05-31&page=$i&key=" . env("KEY") . "&limit=500");
            $data = $response->json('data');
            if (!$data || $data === [] || !is_array($data)) {
                $i = 0;
                $flag = false;
                continue;
            }


            if(time()>$timeInMinute){
                sleep(5);
                $timeInMinute = time() + 60; //60 seconds
            }


            foreach ($data as $key => $value) {
                DB::table('sales')->insert([
                    'g_number' => $value['g_number'],
                    'date' => $value['date'],
                    'last_change_date' => $value['last_change_date'],
                    'supplier_article' => $value['supplier_article'],
                    'tech_size' => $value['tech_size'],
                    'barcode' => $value['barcode'],
                    'total_price' => $value['total_price'],
                    'discount_percent' => $value['discount_percent'],
                    'is_supply' => $value['is_supply'],
                    'is_realization' => $value['is_realization'],
                    'promo_code_discount' => $value['promo_code_discount'],
                    'warehouse_name' => $value['warehouse_name'],
                    'country_name' => $value['country_name'],
                    'oblast_okrug_name' => $value['oblast_okrug_name'],
                    'region_name' => $value['region_name'],
                    'income_id' => $value['income_id'],
                    'sale_id' => $value['sale_id'],
                    'odid' => $value['odid'],
                    'spp' => $value['spp'],
                    'for_pay' => $value['for_pay'],
                    'finished_price' => $value['finished_price'],
                    'price_with_disc' => $value['price_with_disc'],
                    'nm_id' => $value['nm_id'],
                    'subject' => $value['subject'],
                    'category' => $value['category'],
                    'brand' => $value['brand'],
                    'is_storno' => $value['is_storno'],
                ]);
            }
        }
        return "All sales save";

    }
}
