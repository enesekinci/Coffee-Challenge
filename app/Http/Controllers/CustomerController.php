<?php

namespace App\Http\Controllers;

use App\Customers\Customer;
use App\Customers\CustomerInterface;
use App\Customers\PortalCoffee;
use App\Customers\Starbucks;
use App\Models\StarbucksCustomer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $companies = ['starbucks', 'portal'];

    public function checkCompany($company)
    {
        if (!in_array($company, $this->companies)) {
            abort(404);
        }
    }

    public function index($company)
    {
        $this->checkCompany($company);
        return view('customer.' . $company, ['company' => $company]);
    }

    public function store(Request $request, $company)
    {
        $this->checkCompany($company);

        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'birthday' => 'required|date',
            'phone' => 'required',
        ]);

        if ($company == 'starbucks') {

            $customer = new Starbucks($request->name, $request->surname,  $request->phone, $request->birthday, $request->TCNo);
        } else {
            $customer = new PortalCoffee($request->name, $request->surname,  $request->phone, $request->birthday);
        }

        $request->validate([
            'phone' => 'required|unique:' . $customer->getTable() . ',phone',
        ]);

        return $this->saveCustomer($customer);
    }

    public function saveCustomer(CustomerInterface $customer)
    {
        $result =  $customer->save();
        return redirect()->back()->with('result', $result);
    }
}
