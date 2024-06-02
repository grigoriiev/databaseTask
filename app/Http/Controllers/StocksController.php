<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StocksController extends Controller
{
    public function index()
    {
        $today = date("Y-m-d");
        set_time_limit(0);

        $flag = true;
        $i = 0;
        while ($flag) {
            $i++;
            $response = Http::get("http://89.108.115.241:6969/api/stocks?dateFrom=$today&dateTo=2029-05-31&page=$i&key=" . env("KEY") . "&limit=500");
            $data = $response->json('data');
            if (!$data || $data === [] || !is_array($data)) {
                $i = 0;
                $flag = false;
                continue;
            }

            foreach ($data as $key => $value) {
                DB::table('stocks')->insert([
                    'date' => $value['date'],
                    'last_change_date' => $value['last_change_date'],
                    'supplier_article' => $value['supplier_article'],
                    'tech_size' => $value['tech_size'],
                    'barcode' => $value['barcode'],
                    'quantity' => $value['quantity'],
                    'is_supply' => $value['is_supply'],
                    'is_realization' => $value['is_realization'],
                    'quantity_full' => $value['quantity_full'],
                    'warehouse_name' => $value['warehouse_name'],
                    'in_way_to_client' => $value['in_way_to_client'],
                    'nm_id' => $value['nm_id'],
                    'subject' => $value['subject'],
                    'category' => $value['category'],
                    'sc_code' => $value['sc_code'],
                    'price' => $value['price'],
                    'discount' => $value['discount']
                ]);
            }
        }
        return 'All stocks saves';
    }
}
