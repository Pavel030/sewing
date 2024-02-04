<?php

namespace App\Services;

use Illuminate\Support\Collection;

/**
 * The service contains a chain of methods for implementing material consumption and calculating the remainder.
 */
class WarehouseService
{
    use HasAccount;

    /**
     * Assign the initial quantity of products in the warehouse.
     *
     * @var Collection
     */
    protected Collection $warehouse;

    public function __construct()
    {
        $this->warehouse = $this->getInitRemain();
    }

    /**
     *The method simulates the spend of warehouse materials depending on the amount of product produced.
     *
     * @param int $productId
     * @param int $quantity
     * @return $this
     */
    public function spendOnProduct(int $product_id, int $quantity): self
    {
        $product_spend = $this->getSpend($product_id, $quantity);
        $this->warehouse = $this->getRemain($this->warehouse, $product_spend);
        return $this;
    }

    /**
     * Returns the current quantity of goods in stock.
     *
     * @return Collection
     */
    public function getWarehouse(): Collection
    {
        return $this->warehouse;
    }
}
