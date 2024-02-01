<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adding New Customer') }}
        </h2>
    </x-slot>

    <x-panel>
        <x-splade-form method="POST" :action="route('customers.store')">
            <x-splade-input name="code" label="Customer Code*" />
            <x-splade-input name="name" label="Customer Name*" />
            <x-splade-input name="manager_name" label="Manager Name*" />
            <x-splade-input name="phone_number" label="Phone Number*" />
            <x-splade-input name="country" label="Country*" />
            <x-splade-input name="city" label="City*" />
            <x-splade-input name="street" label="Street*" />
            <x-splade-input name="street_number" label="Street Number*" />

            <x-splade-submit />
        </x-splade-form>
    </x-panel>

</x-app-layout>
