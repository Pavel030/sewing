<?php

namespace App\Http\Controllers;

use App\Services\HasAccount;
use App\Services\HasQuery;
use App\Services\WarehouseService;
use Illuminate\Support\Collection;

class ResponseController extends Controller
{
    use HasQuery;
    use HasAccount;

    /**
     * Returns a Collection object containing the calculated balance or material requirements for the production of the listed products.
     *
     * @return Collection
     */
    public function __invoke(): Collection
    {
        $warehouseService = new WarehouseService();

        return $warehouseService
            ->spendOnProduct(1, 20)
            ->spendOnProduct(2, 30)
            ->getWarehouse();
    }
}
