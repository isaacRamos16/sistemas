<x-layouts.app :title="__('Listado de Equipos')">
    <flux:breadcrumbs class="mb-8">
        <flux:breadcrumbs.item :href="route('dashboard')">Home</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.equipo.index')">Equipos</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.equipo.create')">Nuevo equipo</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="card">
        <form action="{{ route('admin.equipo.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Nombre del equipo --}}
                <flux:input 
                    label="Nombre del equipo" 
                    name="nombre_equipo" 
                    value="{{ old('nombre_equipo') }}"
                    required
                />
                @error('nombre_equipo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                {{-- Fecha de adquisición --}}
                <flux:input 
                    label="Fecha de adquisición" 
                    name="fecha_adquisicion" 
                    type="date" 
                    value="{{ old('fecha_adquisicion') }}"
                    required
                />
                @error('fecha_adquisicion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                  {{-- stock --}}
                  <flux:input 
                  label="stock" 
                  name="stock" 
                  type="number" 
                  value="{{ old('stock') }}"
                  required
              />
              @error('fecha_adquisicion')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror


                {{-- Fecha de registro --}}
                <flux:input 
                    label="Fecha de registro" 
                    name="fecha_registro" 
                    type="date" 
                    value="{{ old('fecha_registro') }}"
                    required
                />
                @error('fecha_registro')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                {{-- Estado del equipo --}}
                <div>
                    <label for="id_estado_equipo" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Estado del equipo</label>
                    <select name="id_estado_equipo" id="id_estado_equipo" class="w-full p-2 rounded border border-gray-300">
                        <option value="">Seleccionar estado</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado->id_estado_equipo }}" @selected(old('id_estado_equipo') == $estado->id_estado_equipo)>
                                {{ $estado->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_estado_equipo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

 
                {{-- Tipo Equipo --}}
                <div>
                    <label for="id_tipo_equipo" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Tipo Equipo</label>
                    <select name="id_tipo_equipo" id="id_tipo_equipo" class="w-full p-2 rounded border border-gray-300">
                        <option value="">Seleccionar estado</option>
                        @foreach($tipos as $teq)
                            <option value="{{ $teq->id_tipo_equipo }}" @selected(old('id_tipo_equipo') == $teq->id_tipo_equipo)>
                                {{ $teq->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_tipo_equipo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
 
            </div>

            <div class="mt-6 text-right">
                <button type="submit"
                    class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
                    Crear Equipo
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
