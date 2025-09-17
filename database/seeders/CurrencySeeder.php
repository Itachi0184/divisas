<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        $currencies = json_decode(file_get_contents(database_path('data/currencies.json')), true);

        foreach ($currencies as $currency) {
            DB::table('currencies')->insert([
                'code'           => $currency['code'],
                'symbol'         => $currency['symbol'],
                'name'           => $currency['name'],
                'symbol_native'  => $currency['symbol_native'],
                'decimal_digits' => $currency['decimal_digits'],
                'rounding'       => $currency['rounding'],
                'name_plural'    => $currency['name_plural'],
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}

