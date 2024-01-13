<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promocode;

class PromocodeSeeder extends Seeder
{
    public function run() {
        $promocode = [
            [
                'name'              => 'Promocode 1',
                'description'       => 'Description Discount for use in Store only',
                'code'              => 'cdb3djsb',
                'redeem_count'      => '0',
                'limit'             => '5',
                'expires_at'        => '2024-02-01 00:00:00',
                'status'            => '1',
                'user_id'           => '1',
                'code_detail_id'    => '1',
            ],
            [
                'name'              => 'Promocode 2',
                'description'       => 'Description Discount for use in Store only',
                'code'              => 'rtb9ajsb',
                'redeem_count'      => '0',
                'limit'             => '5',
                'expires_at'        => '2024-03-01 00:00:00',
                'status'            => '0',
                'user_id'           => '1',
                'code_detail_id'    => '2',
            ],
        ];
        Promocode::insert($promocode);
    }
}
