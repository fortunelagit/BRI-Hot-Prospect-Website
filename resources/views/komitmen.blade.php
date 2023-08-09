<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Target Komitmen
        </h2>
    </x-slot>

<div class="flex flex-column">
    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow my-10">
        <livewire:donut-chart :data="$prospek"/>
    </div>
    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow my-10">
        <livewire:donut-chart :data="$real"/>
    </div>
</div>

</x-app-layout>