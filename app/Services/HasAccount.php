<?php

namespace App\Services;

use Illuminate\Support\Collection;

trait HasAccount
{
    use HasQuery;

    /**
     * Attention! The method receives the remain of the warehouse materials,
     * which itself returns by subtracting from it the amount of materials necessary
     * for the production of the N-quantity of product.
     *
     * @param Collection $remain
     * @param Collection $product_spend
     * @return Collection
     */
    public static function getRemain(Collection $remain, Collection $product_spend): Collection
    {
        return $remain->map(function ($item1) use ($product_spend) {
            $item2 = $product_spend->where('material_id', $item1->material_id)->first();
            if ($item2) {
                $item1->remain = $item1->remain - $item2->quantity;
            }
            return $item1;
        });
    }

}

