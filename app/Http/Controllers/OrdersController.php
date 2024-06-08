<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrdersController extends Controller
{
    public function index(): string
    {

        set_time_limit(0);

        $flag = true;
        $i = 0;
        $timeInMinute = time() + 60; //60 seconds
        while ($flag) {
            $i++;
            $response = Http::get("http://89.108.115.241:6969/api/orders?dateFrom=2020-05-31&dateTo=2029-05-31&page=$i&key=" . env("KEY") . "&limit=500");
            $data = $response->json('data');
            if (!$data || $data === [] || !is_array($data)) {
                $i = 0;
                $flag = false;
                continue;
            }

            $timeInMinute = time() + 60; //60 seconds
            if(time()>$timeInMinute){
                sleep(5);
                $timeInMinute = time() + 60; //60 seconds
            }

            foreach ($data as $key => $value) {
                DB::table('orders')->insert([
                    'g_number' => $value['g_number'],
                    'date' => $value['date'],
                    'last_change_date' => $value['last_change_date'],
                    'supplier_article' => $value['supplier_article'],
                    'tech_size' => $value['tech_size'],
                    'barcode' => $value['barcode'],
                    'subject' => $value['subject'],
                    'brand' => $value['brand'],
                    'income_id' => $value['income_id'],
                    'nm_id' => $value['nm_id'],
                    'category' => $value['category'],
                    'total_price' => $value['total_price'],
                    'discount_percent' => $value['discount_percent'],
                    'warehouse_name' => $value['warehouse_name'],
                    'is_cancel' => $value['is_cancel'],
                    'cancel_dt' => $value['cancel_dt'],
                    'odid' => $value['odid'],
                    'oblast' => $value['oblast'],
                ]);
            }


        }


        return 'All orders save';
    }
}
