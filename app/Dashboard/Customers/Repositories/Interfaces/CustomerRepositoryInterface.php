<?php

namespace App\Dashboard\Customers\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Dashboard\Customers\Customers;
use Illuminate\Support\Collection;

interface CustomerRepositoryInterface extends BaseRepositoryInterface
{
    public function listCustomers(int $length, int $page, int $orderBy, string $orderDir, string $country,string $state) ;

    public function paginateData( array $data, int $perPage = 10,int $page);

}
