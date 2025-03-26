<x-layouts.app :title="__('Dashboard')">

  
<flux:breadcrumbs class="mb-8">
        <flux:breadcrumbs.item :href="route('dashboard')">Home</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.cargo.index')">cargo</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.cargo.create')">Nuevo cargo</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <form action="{{ route('admin.cargo.store') }}" method="POST">
    @csrf

    <div class="card">
        <flux:input wire:model="cargo" name="descripcion" label="Cargo" id="cargo" description="Registrar Cargo" />
        @error('descripcion')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <button type="submit"
            class="mt-8 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            Registrar Cargo
        </button>
    </div>
</form>






</x-layouts.app>