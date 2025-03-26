<x-layouts.app :title="__('Dashboard')">


<flux:breadcrumbs class="mb-8">
        <flux:breadcrumbs.item :href="route('dashboard')">Home</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.estado-equipo.index')">Estado Equipo</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.estado-equipo.create')">Registrar Equipo</flux:breadcrumbs.item>
    </flux:breadcrumbs>



<div class="card">
<form action="{{ route('admin.estado-equipo.store') }}" method="POST">
@csrf
<flux:input wire:model="estado-equipo" name="descripcion" label="Estado Equipo" id="descripcion" description="Registrar Estado Equipo" />
        @error('descripcion')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror


        <button type="submit"
        class="mt-8 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        Registrar Status
    </button>
</form>
</div>


</x-layouts.app>