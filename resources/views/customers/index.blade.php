<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <x-panel>
        <Link href={{ route('customers.create') }} class="hover:underline">Add New User</Link>
        <!-- <Link modal href="/dashboard">dashboard<Link> -->
        <!-- <Link slideover href="/dashboard">dashboard<Link> -->

        <x-splade-lazy>
            <x-slot:placeholder> Loading... </x-slot:placeholder>
            <x-splade-table :for="$customers" striped>
                <x-slot:empty-state>
                    <p>Customers not found!</p>
                </x-slot>
                @cell('actions', $customer)
                    <Link href={{ route('customers.edit', $customer) }} class="hover:underline">Edit</Link>
                    <Link 
                        href={{ route('customers.destroy', $customer) }}
                        method="DELETE"
                        confirm="Are you sure to delete this customer?"
                        confirm-button="Yes, delete!"
                        cancel-button="No"
                        class="hover:underline pl-2">
                            Delete
                    </Link>
                @endcell
                </x-splade-table>
        </x-splade-lazy>
    </x-panel>

</x-app-layout>
