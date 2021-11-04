<?php

namespace App\Dashboard\Customers\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Dashboard\Customers\Customer;
use App\Dashboard\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Dashboard\Tools\Country;
use App\Dashboard\Tools\Phone;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    /**
     * CustomerRepository constructor.
     * @param customer $customer
     */
    public function __construct(Customer $customer)
    {
        parent::__construct($customer);
        $this->model = $customer;
    }

    /**
     * List all the customers
     *
     * @param int $length
     * @param int $page
     * @param int $orderBy
     * @param string $orderBy
     * @param string $orderDir
     * @param string $country
     * @param string $state
     * @return Array
     */
    public function listCustomers($length,$page,$orderBy,$orderDir,$country,$state ) : Array
    {
        
        //Fetch data from data base
        $customersList  = $this->all(['*'], $orderBy, $orderDir);

        // customize records
        $customArray    = self::processData($customersList);
        
        // Filter records with phone state
        if($state){ 
            $customArray = array_filter($customArray, function ($var) use($state) {
                return ($var['state'] == $state);
            });
        }

        // Filter records with country
        if($country){
            $customArray = array_filter($customArray, function ($var) use($country) {
                return (strtolower($var['country']) == strtolower($country));
            });
        };

        //Paginate data after finishing filteration
        $finalData = $this->paginateData($customArray,$length,$page);
         
        //return data formatted to datatable  
        return [
            'recordsTotal' => $finalData->total(),
            'recordsFiltered' => $finalData->total(),
            'data' => $finalData
        ];
    }//End of function listCustomers

    /**
     * paginate Data
     *
     * @param array $data
     * @param int $perPage
     * @param int $page
     * @return Array
     */
    public function paginateData(  $data, $perPage = 10,$page) : Object{
        
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(
            array_values(array_slice($data, $offset, $perPage, true)),
            count($data),
            $perPage,
            $page,
            [
                'path' => app('request')->url(),
                'query' => app('request')->query()
            ]
        );
    }//End of function paginateData

    /**
     * processData Data  (add new records and update phones)
     *
     * @param array $customersList
     * @return Array
     */
    public static function processData($customersList){
        $processedData =[];
        foreach ($customersList as $data) {
            
            $phone       = $data['phone'];
            $CountryCode = Country::getCountryCodeFromPhone($phone);
            
            if(!isset($CountryCode))
                continue;

            $data['country'] = Country::getCountryNameFromCode($CountryCode);
            $data['code']    = $CountryCode;
            $data['state']   = Country::validateNumberAccordingToCode($phone,$CountryCode);
            $data['phone']   = Phone::cleanNumner($phone,$CountryCode);
            $processedData[] = $data;
        }
        return $processedData;
    }//End of method processData

}
