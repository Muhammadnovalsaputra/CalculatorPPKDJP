<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Settings::create([
            'app_name' => 'Point Of Sales | PPKD JP',
            'address' => 'Jl Karet Baru',
            'phone_number' => '085475864'
        ]);

        // DB::table('settings')->create([
        //     'app_name' => 'Point Of Sales | PPKD JP',
        //     'address' => 'Jl Karet Baru',
        //     'phone_number' => '085475864']);
    }
}
