<x-layouts.app :title="__('Dashboard')">

<flux:breadcrumbs class="mb-8">
        <flux:breadcrumbs.item :href="route('dashboard')">Home</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.archivos.index')">Files</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.archivos.create')">Nuevo File</flux:breadcrumbs.item>
    </flux:breadcrumbs>



<a href="{{route('admin.archivos.create')}}" class="bg-green-500 mb-8 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Agregar  File
      </a>




</x-layouts.app>