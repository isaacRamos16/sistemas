<x-layouts.app :title="__('Dashboard')">

    <flux:breadcrumbs class="mb-8">
        <flux:breadcrumbs.item :href="route('dashboard')">Home</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.estado_archivo.index')">Estado Archivo</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.estado_archivo.create')">Registrar Estado Archivo
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <div class="card">
        <form action="{{ route('admin.estado_archivo.store') }}" method="POST">
            @csrf
            <flux:input wire:model="Estado Archivo" name="descripcion" label="Estado Archivo" id="descripcion"
                description="Estado Archivo" />
            @error('descripcion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror


            <button type="submit"
                class="mt-8 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Registrar Estado Archivo
            </button>
        </form>
    </div>

    </div>




































</x-layouts.app>
