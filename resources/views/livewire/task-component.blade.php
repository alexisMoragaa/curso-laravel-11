<section>
    <div class="flex justify-between items-center mb-5">
        <h3 class="text-2xl  font-bold">Listado de Tareas</h3>
        <button class="bg-green-500 hover:bg-green-400 rounded-md pt-1 pb-1 pr-3 pl-3" wire:click.prevent="openCreateModal">Crear Tarea</button>
    </div>

    <div class="grid grid-cols-4 gap-4">
        @foreach ($tasks as $t )
            <div class="border rounded-md border-gray-400 p-3  flex flex-col justify-between">
                <div class="info">
                    <p>Tarea: <b> {{$t->title}}</b></p>
                    <p>Descripcion: <b> {{$t->description}}</b></p>
                    <p>Fecha de creacion: <b> {{$t->created_at}}</b></p>
                    <p>Autor: <b> {{$t->user->name}}</b></p>
                </div>

                
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <button wire:click.prevent="deleteTask({{$t}})" class="bg-red-500 hover:bg-red-400 rounded-md">Eliminar</button>

                    <button wire:click.prevent="openCreateModal({{$t}})" class="bg-yellow-500 hover:bg-yellow-400 rounded-md">Editar</button>
                </div>
            
            </div>
        @endforeach
    </div>




    {{-- Modal here --}}
    <!-- component -->
    @if ($modal)
        
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
                <div class="w-full">
                <div class="m-8 my-10 max-w-[500px] mx-auto">
                    <div class="mb-8">
                        <h1 class="mb-4 text-3xl font-extrabold text-gray-900"> 
                            @if (isset($task->id)) Actualizar @else Crear nueva @endif Tarea 

                        </h1>

                        <form action="">
                            <div class="mb-4 ">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Titulo</label>
                                <input wire:model="title" type="text" id="title" name="title" class="bg-gray-50 border text-gray-800 rounded border-gray-300 w-full focus:ring-blue-500 focus:border-blue-500" placeholder="Ingresa el Titulo">
                            </div>
                            <div class="mb-4">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Descripcion</label>
                                <input wire:model="description" type="text" id="description" name="description" class="bg-gray-50 border  text-gray-800 rounded border-gray-300 w-full" placeholder="Ingresa la descripción de la tarea">
                            </div>
                        </form>

                    </div>
                    <div class=" flex justify-beetween items-center gap-4">
                        <button class="p-3 bg-white rounded-full text-yellow-500  w-full font-semibold border border-yellow-400 hover:bg-yellow-400 hover:text-yellow-700" wire:click="closeModal">Cancelar</button>
                        <button class="p-3 bg-green-500 hover:bg-green-400 rounded-full text-white w-full font-semibold" wire:click="createTask">@if (isset($task->id)) Actualizar @else Crear  @endif Tarea </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endif

</section>
