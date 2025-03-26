<x-layouts.app :title="__('Dashboard')">


  
<flux:breadcrumbs class="mb-8">
        <flux:breadcrumbs.item :href="route('dashboard')">Home</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.usuarios.index')">Usuarios</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.usuarios.create')">Nuevo Usuarios</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="card">

        <form action="{{route('admin.usuarios.store')}}" method="POST">
                @csrf
                
                <div class="grid">
                    <div class="item item-1"> 

                    <flux:input wire:model="name" name="name" id="name" label="Nombre" class="mb-2" />
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        
                        <flux:input wire:model="apellido" name="apellido" id="apellido" label="Apellido" class="mb-2" />
                            @error('apellido')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        
                        <flux:input type="email" label="Email" name="email" id="email" class="mb-2" />
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror



                    </div>
                    <div class="item item-2"> 

                    <flux:input type="password" name="password" label="Contraseña" class="mb-2" />
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror


                        <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccionar Cargo</label>
                        <select name="id_cargo" id="cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                        <option value="">Seleccionar Cargo</option>
                            @foreach($cargos as $cargo)
                                <option value="{{ $cargo->id_cargo }}">{{ $cargo->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('id_cargo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccionar Status</label>
                        <select name="id_status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-8">
                            <option value="">Seleccionar Status</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id_status }}">{{ $status->descripcion }}</option>
                            @endforeach
                        </select>
                        
                        @error('id_status')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                                        
                        <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Crear Usuario</button>


                    </div>
                
                  </div>

        </form>


    </div>
  

</x-layouts.app>