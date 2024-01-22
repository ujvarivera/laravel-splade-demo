<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-panel>
        <!---
        <x-splade-modal>
            You're logged in!
        </x-splade-modal>
        -->

        <x-splade-defer url="https://api.quotable.io/random">
            <p v-if="processing">Processing...</p>
            <p v-text="response.content" class="text-xl"/>
            <button @click="reload" class="bg-green-200 p-2 flex justify-center">Reload</button>
        </x-splade-defer>
    </x-panel>
        
</x-app-layout>
