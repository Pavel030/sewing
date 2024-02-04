<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Provides methods with queries.
 */
trait HasQuery
{
    /**
     * Returns a list of materials needed to produce N-quantities of a particular product.
     *
     * @param int $product_id
     * @param int $quantity
     * @return Collection
     */
    public static function getSpend(int $product_id, int $quantity): Collection
    {
        return DB::table('material_products')
            ->select('material_id', DB::raw("CAST(quantity AS NUMERIC) * $quantity as quantity"))
            ->where('product_id', $product_id)
            ->get();
    }

    /**
     * Returns a list of warehouse materials summed by the same material_id.
     *
     * @return Collection
     */
    public static function getInitRemain(): Collection
    {
        return DB::table('warehouse')
            ->select('material_id', DB::raw('SUM(remain) as remain'))
            ->groupBy('material_id')
            ->get();
    }
}
