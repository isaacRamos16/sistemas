<x-layouts.app :title="__('Listado de Equipos')">
<flux:breadcrumbs class="mb-8">
        <flux:breadcrumbs.item :href="route('dashboard')">Home</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.equipo.index')">equipo</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.equipo.create')">Nuevo equipo</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <a href="{{ route('admin.equipo.create') }}" class="bg-green-500 mb-8 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Agregar Equipo
    </a>

  
    <table id="example" class="display compact nowrap mt-8" style="width:100%">
        <thead>
            <tr> 
                <th></th>
                <th>ID</th>
                <th>Nombre del equipo</th>
                <th>Estado</th>
                <th>Tipo de Equipo</th>
                <th>Stock</th>
                <th>Fecha Adquisición</th>
                <th>Fecha Registro</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
                <tr>
                    <td></td>
                    <td>{{ $equipo->id_equipo }}</td>
                    <td>{{ $equipo->nombre_equipo }}</td>
                    <td>{{ $equipo->stock }}</td>
                    <td>{{ $equipo->estado->descripcion ?? 'Sin estado' }}</td>
                    <td>{{ $equipo->tipo->descripcion ?? 'Sin tipo' }}</td>
                    <td>{{ $equipo->fecha_adquisicion }}</td>
                    <td>{{ $equipo->fecha_registro }}</td>
                    <td>
                        <div class="grid grid-cols-2 gap-2">
                            <flux:modal.trigger name="edit-equipo-{{ $equipo->id_equipo }}">
                                <i class="fa-solid fa-pen-to-square text-blue-600 cursor-pointer"></i>
                            </flux:modal.trigger>
                    
                            <form action="{{ route('admin.equipo.destroy', $equipo->id_equipo) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="fa-solid fa-trash text-red-600"></i></button>
                            </form>
                            
                        </div>
                    
                        <flux:modal name="edit-equipo-{{ $equipo->id_equipo }}" class="md:w-96">
                            <form action="{{ route('admin.equipo.update', $equipo->id_equipo) }}" method="POST">
                                @csrf
                                @method('PUT')
                    
                                <div class="space-y-6">
                                    <div>
                                        <flux:heading size="lg">Editar Equipo</flux:heading>
                                        <flux:text class="mt-2">Actualiza los datos del equipo.</flux:text>
                                    </div>
                    
                                    <flux:input label="Nombre del Equipo" name="nombre_equipo" value="{{ $equipo->nombre_equipo }}" />
                                    <flux:input label="Stock" name="stock" type="number" value="{{ $equipo->stock }}" />
                    
                                    <label for="id_estado_equipo" class="block text-sm font-medium">Estado</label>
                                    <select name="id_estado_equipo" class="w-full p-2 rounded">
                                        @foreach($estados as $estado)
                                            <option value="{{ $estado->id_estado_equipo }}" @selected($estado->id_estado_equipo == $equipo->id_estado_equipo)>
                                                {{ $estado->descripcion }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label for="id_tipo_equipo" class="block text-sm font-medium">Tipo de Equipo</label>
                                    <select name="id_tipo_equipo" class="w-full p-2 rounded">
                                        @foreach($tipos as $teq)
                                            <option value="{{ $teq->id_tipo_equipo }}" @selected($teq->id_tipo_equipo == $equipo->id_tipo_equipo)>
                                                {{ $teq->descripcion }}
                                            </option>
                                        @endforeach
                                    </select>

                    
                                    <div class="flex justify-end pt-4">
                                        <flux:button type="submit" variant="primary">Guardar Cambios</flux:button>
                                    </div>
                                </div>
                            </form>
                        </flux:modal>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layouts.app>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Previene el envío automático

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta acción no se puede deshacer!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Envía el formulario si el usuario confirma
                    }
                });
            });
        });
    });
</script>


