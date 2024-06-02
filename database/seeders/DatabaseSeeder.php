<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $flag=true;

        while ($flag) {

            $response = Http::get('http://89.108.115.241:6969/api/incomes?dateFrom=2020-05-31&dateTo=2029-05-31&page=1&key=E6kUTYrYwZq2tN4QEtyzsbEBk3ie&limit=500');




            $flag=false;

            dd($response);
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
