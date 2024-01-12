<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TermCondition;

class TermConditionSeeder extends Seeder
{
    public function run() {
        $termCondition = [
            [
                'title'      => 'Terms 1',
                'content'    => 'Offer is valid on E-store only',
            ],
            [
                'title'      => 'Terms 2',
                'content'    => 'Limited to one-time redemption only, while stocks last',
            ],
            [
                'title'      => 'Terms 3',
                'content'    => 'Offer is not applicable on discounted items',
            ],
            [
                'title'      => 'Terms 4',
                'content'    => 'This coupon is valid for 180 days from the date sent by the sender',
            ],
            [
                'title'      => 'Terms 5',
                'content'    => 'This coupon is valid for ONE time use only',
            ],
            [
                'title'      => 'Terms 6',
                'content'    => 'Vouchers cannot be combined with any other online redemption/voucher codes',
            ], 
            [
                'title'      => 'Terms 7',
                'content'    => 'This voucher is non-transferable and can only be used by the account holder',
            ],
            [
                'title'      => 'Terms 8',
                'content'    => 'Not applicable in West Malaysia',
            ],
            [
                'title'      => 'Terms 9',
                'content'    => 'This voucher is non-transferable and can only be used by the account holder',
            ],
            [
                'title'      => 'Terms 10',
                'content'    => 'This coupon is non-transferable and can only be used by the account holder',
            ],
            [
                'title'      => 'Terms 11',
                'content'    => 'This voucher is non-transferable',
            ],
        ];
        TermCondition::insert($termCondition);
    }
}
