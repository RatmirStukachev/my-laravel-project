<?php

use App\Models\Color;
use App\Models\Product;

if (!function_exists('discount')) {

    function discount(Product $product): int
    {
        if (!$product->old_price) {
            return 0;
        }

        $discount = ($product->old_price - $product->price) / $product->old_price * 100;

        return round($discount);
    }
}

if (!function_exists('format_price')) {
    function format_price($price): string
    {
        return number_format($price, 2, '.', ' ') . ' BYN';
    }
}

if (!function_exists('get_sort_title')) {
    function get_sort_title($string): string
    {
        return match ($string) {
            'poor' => 'Сначала дешевые',
            'expensive' => 'Сначала дорогие',
            'new' => 'Сначала новые',
            'sale' => 'Сначала со скидкой',
            default => 'Сначала дешевые',
        };
    }
}
