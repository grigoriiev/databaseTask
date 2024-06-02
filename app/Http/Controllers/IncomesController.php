<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class IncomesController extends Controller
{
    public function index(): string
    {
        set_time_limit(0);
        $flag = true;
        $i = 0;
        while ($flag) {
            $i++;
            $response = Http::get("http://89.108.115.241:6969/api/incomes?dateFrom=2020-05-31&dateTo=2029-05-31&page=$i&key=" . env("KEY") . "&limit=500");
            $data = $response->json('data');
            if (!$data || $data === [] || !is_array($data)) {
                $i = 0;
                $flag = false;
                continue;
            }


            foreach ($data as $key => $value) {
                DB::table('incomes')->insert([
                    'date' => $value['date'],
                    'last_change_date' => $value['last_change_date'],
                    'supplier_article' => $value['supplier_article'],
                    'tech_size' => $value['tech_size'],
                    'barcode' => $value['barcode'],
                    'quantity' => $value['quantity'],
                    'number' => $value['number'],
                    'date_close' => $value['date_close'],
                    'warehouse_name' => $value['warehouse_name'],
                    'total_price' => $value['total_price'],
                    'nm_id' => $value['nm_id'],
                    'status' => $value['status'],
                ]);
            }

        }
        return 'All incomes save';
    }
}
