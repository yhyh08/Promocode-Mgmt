<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CodeDetail;

class CodeDetailSeeder extends Seeder
{
    public function run() {
        $codeDetail = [
            [
                'minimum_price'         => '200',
                'discount_amount'       => '30',
                'discount_type_id'      => '1',
                'term_condition_id'     => json_encode(['1','2']),
            ],
            [
                'minimum_price'         => '100',
                'discount_amount'       => '10',
                'discount_type_id'      => '4',
                'term_condition_id'     => json_encode(['2','5']),
            ],
            [
                'minimum_price'         => '200',
                'discount_amount'       => '50',
                'discount_type_id'      => '3',
                'term_condition_id'     => json_encode(['3','4','5','7']),
            ],
            [
                'minimum_price'         => '300',
                'discount_amount'       => '50',
                'discount_type_id'      => '3',
                'term_condition_id'     => json_encode(['3','6']),
            ],
        ];
        CodeDetail::insert($codeDetail);
    }
}
