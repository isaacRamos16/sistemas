<x-layouts.app :title="__('Dashboard')">

<flux:breadcrumbs class="mb-8">
        <flux:breadcrumbs.item :href="route('dashboard')">Home</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.archivos.index')">Files</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.archivos.create')">Nuevo File</flux:breadcrumbs.item>
    </flux:breadcrumbs>


    <form action="{{ route('admin.archivos.store') }}" method="POST">
        @csrf
<div class="card">
    <div class="grid">
        <div>
            <flux:input 
            label="Descripcion del Archivo" 
            name="descripcion_archivo" 
            value="{{ old('descripcion_archivo') }}"
            required
        />
        @error('descripcion_archivo')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror




        </div>
        <div>

            <label for="id_tipo_archivo" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Estado del equipo</label>
            <select name="id_tipo_archivo" id="id_tipo_archivo" class="w-full p-2 rounded border border-gray-300">
                <option value="">Seleccionar estado</option>
                @foreach($archivos as $arch)
                    <option value="{{ $arch->id_tipo_archivo }}" @selected(old('id_tipo_archivo') == $arch->id_tipo_archivo)>
                        {{ $arch->descripcion }}
                    </option>
                @endforeach
            </select>
            @error('id_tipo_archivo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        


        <div>
            <button type="submit"
            class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
            Crear Equipo
        </button>

        </div>
    </div>
</div>


</form>


</x-layouts.app>