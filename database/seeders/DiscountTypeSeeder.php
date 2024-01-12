<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiscountType;

class DiscountTypeSeeder extends Seeder
{
    public function run() {
        $discountType = [
            [
                'name'        => 'Discount Price',
                'category'    => '1',
                'type'        => '1',
                'remark'      => 'coupons',
            ],
            [
                'name'        => 'Discount Percentage',
                'category'    => '1',
                'type'        => '2',
                'remark'      => 'coupons',
            ],
            [
                'name'        => 'Discount Price',
                'category'    => '2',
                'type'        => '1',
                'remark'      => 'vouchers',
            ],
            [
                'name'        => 'Discount Percentage',
                'category'    => '2',
                'type'        => '2',
                'remark'      => 'vouchers',
            ],
        ];
        DiscountType::insert($discountType);
    }
}
