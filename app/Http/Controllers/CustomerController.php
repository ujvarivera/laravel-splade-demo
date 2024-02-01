<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!auth()->user()->canLoginToOfficeInterface(), 403, __('Unauthorized action.'));

        // $customers = Customer::all();

        return view('customers/index', [
            // 'customers' => Splade::onLazy(fn () => Customer::latest()->limit(10)->get())
            'customers' => SpladeTable::for(Customer::class)
                ->defaultSort('created_at', 'desc')
                ->withGlobalSearch(columns:['name', 'manager_name', 'phone_number'])
                ->column('created_at', hidden:true)
                ->column('name', sortable:true, searchable:true)
                ->column('manager_name', sortable:true, searchable:true)
                ->column('phone_number', sortable:true, searchable:true)
                ->column('actions')
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!auth()->user()->canLoginToOfficeInterface(), 403, __('Unauthorized action.'));

        return view('customers/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!auth()->user()->canLoginToOfficeInterface(), 403, __('Unauthorized action.'));

        $validated = $request->validate([
            'code' => ['required', 'unique:customers'],
            'name' => ['required', 'string', 'max:100'],
            'manager_name' => ['required', 'string', 'max:100'],
            'phone_number' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'street' => ['required'],
            'street_number' => ['required']
        ]);

        $customer = Customer::create($validated);

        Toast::title(__('New Customer added!'));

        return redirect()->route('customers.edit', $customer);

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
        abort_if(!auth()->user()->canLoginToOfficeInterface(), 403, __('Unauthorized action.'));

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

        Toast::title(__('The customer was updated!'));

        return redirect()->route('customers.edit', $customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        abort_if(!auth()->user()->canLoginToOfficeInterface(), 403, __('Unauthorized action.'));

        $customer->delete();

        Toast::title(__('The customer was deleted!'));

        return redirect()->route('customers.index');
    }
}
