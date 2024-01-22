<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <x-panel>

        <!-- <Link modal href="/dashboard">dashboard<Link> -->
        <!-- <Link slideover href="/dashboard">dashboard<Link> -->

        <x-splade-lazy>
            <x-slot:placeholder> Loading... </x-slot:placeholder>
            @foreach($customers as $customer)
                <p>
                    <div>
                        {{ $customer->name }}
                        <Link href={{ route('customers.edit', $customer) }} class="hover:underline">Edit</Link>
                    </div>
                </p>
            @endforeach
        </x-splade-lazy>
    </x-panel>

</x-app-layout>
