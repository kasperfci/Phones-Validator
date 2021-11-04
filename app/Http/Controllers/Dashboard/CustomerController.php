<?php

namespace App\Http\Controllers\Dashboard;

use App\Dashboard\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Dashboard\Customers\Repositories\CustomerRepository;
use App\Dashboard\Customers\Customer;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;

use App\Dashboard\Tools\Country;
use App\Dashboard\Tools\Phone;


class CustomerController extends Controller
{
 
    /**
    * @var CustomerRepository
    */
    private $CustomerRepo;

    /**
     * CustomerController constructor.
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository) {
        $this->customerRepo = $customerRepository;
    }

    public function index(Request $request){

        if($request->ajax()){ 
            // columns sent from datatable request
            $start      = $request->start;
            $length     = $request->length;
            $page       = ($start / $length + 1);
            $columns    = $request->columns;
            $order      = $request->order[0]['column'];
            $orderBy    = $columns[$order]["name"];
            $orderDir   = $request->order[0]['dir'];
            $country    = $columns[1]["search"]["value"];
            $state      = $columns[2]["search"]["value"];

            return $this->customerRepo->listCustomers($length,$page,$orderBy,$orderDir,$country,$state);
        }

        $statusList     = Phone::phonesStatesList();
        $countriesList  = Country::countriesNamesList();

        return view('system/index',compact('statusList','countriesList'));
    }//End of function index


  

    
}
