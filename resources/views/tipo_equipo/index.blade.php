<x-layouts.app :title="__('Dashboard')">

<flux:breadcrumbs class="mb-8">
        <flux:breadcrumbs.item :href="route('dashboard')">Home</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.tipo_equipo.index')">Tipo Equipo</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.tipo_equipo.create')">Nuevo Tipo Equipo</flux:breadcrumbs.item>
    </flux:breadcrumbs>


    <a href="{{route('admin.tipo_equipo.create')}}" class="bg-green-500 mb-8 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Agregar Tipo Equipo
      </a>



      <table id="example" class="display compact nowrap mt-8" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>DESCRIPCIÓN</th>
            <th>OPCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tipo_equipo as $item)
            <tr>
                <td></td>
                <td>{{ $item->id_tipo_equipo }}</td>
                <td>{{ $item->descripcion }}</td>
                <td >
                    <div class="grid">
                        <div>
                            <flux:modal.trigger name="edit-tipo_equipo-{{ $item->id_tipo_equipo }}">
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
                            <form action="{{ route('admin.tipo_equipo.destroy', $item->id_tipo_equipo) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <flux:button type="submit" class="btn-delete" variant="ghost">
                                    <i class="fa-solid fa-trash text-red-500"></i>
                                </flux:button>
                            </form>
                            
                        </div>
                    </div>


                </td>
            </tr>

             {{-- Modal Editar --}}
             <flux:modal name="edit-tipo_equipo-{{ $item->id_tipo_equipo }}" class="md:w-96">
                <form action="{{ route('admin.tipo_equipo.update', $item->id_tipo_equipo) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <div>
                            <flux:heading size="lg">Editar Tipo Equipo</flux:heading>
                            <flux:text class="mt-2">Modifica la descripción del Tipo Equipo.</flux:text>
                        </div>

                        <flux:input label="Descripción" name="descripcion" value="{{ $item->descripcion }}" />

                        <div class="flex justify-end pt-4">
                            <flux:button type="submit" variant="primary">Guardar Cambios</flux:button>
                        </div>
                    </div>
                </form>
            </flux:modal>
        @endforeach
          
     
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