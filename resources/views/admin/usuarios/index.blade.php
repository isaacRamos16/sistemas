<x-layouts.app :title="__('Dashboard')">



  
    <flux:breadcrumbs class="mb-8">
        <flux:breadcrumbs.item :href="route('dashboard')">Home</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.usuarios.index')">Usuarios</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <a href="{{route('admin.usuarios.create')}}" class="bg-green-500 mb-8 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Agregar Usuarios
      </a>

  

      <table id="example" class="display compact nowrap mt-8" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>CORREO</th>
                <th>CARGO</th>
                <th>STATUS</th>
                <th>CREACION</th>
                <th>OPCIONES</th>
            </tr>
        </thead>
        <tbody >
            @foreach($usuarios as $usuario)
                <tr >
                    <td></td>
                
                    <td> {{ $usuario->id }}  </td>
                    <td>  {{ $usuario->name }} </td>
                    <td>  {{ $usuario->apellido }} </td>
                    <td> {{ $usuario->email }}  </td>
                    <td>{{ $usuario->cargo->descripcion ?? 'Sin cargo' }}</td>
                    <td>{{ $usuario->status->descripcion ?? 'Sin estado' }}</td>                    
                    <td>  {{ $usuario->created_at }} </td>
                    <td>
                        <div class="grid2 pt-2">
                            <div>
                                <flux:modal.trigger name="edit-profile-{{ $usuario->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 
                                               0 112.652 2.652L10.582 16.07a4.5 
                                               4.5 0 01-1.897 1.13l-3.182.954.954-3.182a4.5 
                                               4.5 0 011.13-1.897l9.275-9.275zm0 0L19.5 
                                               7.125M18 14.25v4.125A2.625 2.625 
                                               0 0115.375 21H5.625A2.625 2.625 0 
                                               013 18.375V8.625A2.625 2.625 0 
                                               015.625 6H9.75"/>
                                    </svg>
                                </flux:modal.trigger>
                            </div>
                            <div>
                                <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button type="submit" class="btn-delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </flux:button>
                                </form>
                                
                            </div>
                        </div>
                   
                      
                        
    <flux:modal name="edit-profile-{{ $usuario->id }}" class="md:w-96">
        <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Editar Usuario</flux:heading>
                    <flux:text class="mt-2">Modificá los datos del usuario.</flux:text>
                </div>
    
                <flux:input label="Nombre" name="name" value="{{ $usuario->name }}" />
                <flux:input label="Apellido" name="apellido" value="{{ $usuario->apellido }}" />
                    <flux:input type="password" name="password" label="Nueva contraseña (opcional)" />

                <flux:input label="Correo" type="email" name="email" value="{{ $usuario->email }}" />
                
                <label for="id_cargo">Cargo</label>
                <select name="id_cargo" class="w-auto p-2 rounded">
                    @foreach($cargos as $cargo)
                        <option value="{{ $cargo->id_cargo }}" @selected($cargo->id_cargo == $usuario->id_cargo)>
                            {{ $cargo->descripcion }}
                        </option>
                    @endforeach
                </select>
                <br>
                <label for="id_status">Status</label>
                <select name="id_status" class="w-auto p-2 rounded">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id_status }}" @selected($status->id_status == $usuario->id_status)>
                            {{ $status->descripcion }}
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
                
            </tr>
        </tbody>
     </table>




    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Previene el envío inmediato

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer.",
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


</x-layouts.app>