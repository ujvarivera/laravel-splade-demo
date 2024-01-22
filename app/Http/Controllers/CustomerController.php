<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!auth()->user()->canLoginToOfficeInterface(), 403, __('Unauthorized action.'));

        $customers = Customer::all();

        return view('customers/index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        abort_if(!auth()->user()->canLoginToOfficeInterface(), 403, __('Unauthorized action.'));

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'code' => ['required'],
            'name' => ['required', 'string', 'max:100'],
            'manager_name' => ['required', 'string', 'max:100'],
            'phone_number' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'street' => ['required'],
            'street_number' => ['required']
        ]);

        $customer->update($validated);

        Toast::title('The customer was updated!');

        return redirect()->route('customers.edit', $customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
