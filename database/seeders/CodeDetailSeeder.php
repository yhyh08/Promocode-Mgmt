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
                'term_condition_id'     => ['Terms 1','Terms 2'],
            ],
            [
                'minimum_price'         => '100',
                'discount_amount'       => '10',
                'discount_type_id'      => '4',
                'term_condition_id'     => ['Terms 2','Terms 5'],
            ],
            [
                'minimum_price'         => '200',
                'discount_amount'       => '50',
                'discount_type_id'      => '3',
                'term_condition_id'     => ['Terms 3','Terms 4','Terms 5','Terms 7'],
            ],
            [
                'minimum_price'         => '300',
                'discount_amount'       => '50',
                'discount_type_id'      => '3',
                'term_condition_id'     => ['Terms 3','Terms 6'],
            ],
        ];
        CodeDetail::insert($codeDetail);
    }
}
