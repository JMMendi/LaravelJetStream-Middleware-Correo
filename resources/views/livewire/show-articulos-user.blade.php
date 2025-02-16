<x-self.base>
    <div class="flex flex-row justify-between">
        <div>
            <x-input class="w-full mb-2" placeholder="Buscar..." wire:model.live="texto"/>
        </div>
        <div>
            @livewire('create-articles')
        </div>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="ordenar('title')">
                        Titulo <i class="ml-1 fas fa-sort"></i>
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="ordenar('content')">
                        Contenido <i class="ml-1 fas fa-sort"></i>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha Creación
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="ordenar('name')">
                        Tags <i class="ml-1 fas fa-sort"></i>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($articulos as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->title}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->content}}
                    </td>
                    <td class="px-6 py-4">
                        {{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->name}}
                    </td>
                    <td class="px-6 py-4">
                        <button wire:click="confirmarBorrado({{$item->id}})">
                            <i class="fas fa-trash text-gray-500 hover:text-gray-800 hover:text-2xl"></i>
                        </button>
                        <button wire:click="abrirModalUpdate({{$item->id}})">
                            <i class="fas fa-edit text-green-500 hover:text-green-800 hover:text-2xl"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{$articulos->links()}}
    </div>

    <x-dialog-modal wire:model="abrirModalEditar">
        <x-slot name="title">
            Editar Artículo
        </x-slot>
        <x-slot name="content">
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Título del Artículo</label>
                <input type="text" id="title" wire:model="uform.title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                <x-input-error for="uform.title"/>
            </div>
            <div class="mb-5">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Contenido del Artículo</label>
                <textarea name="content" wire:model="uform.content" id="content" rows="5" cols="50"></textarea>
                <x-input-error for="uform.content"/>
            </div>
            <div class="mb-5">
                <label for="tag_id" class="block mb-2 text-sm font-medium text-gray-900">Etiqueta del Artículo</label>
                <select name="tag_id" id="tag_id" wire:model="uform.tag_id">
                    <option value="">Selecciona una Etiqueta</option>
                    @foreach($tags as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <x-input-error for="uform.tag_id"/>

            </div>

        </x-slot>
        <x-slot name="footer">
            <button type="submit" wire:click="editarArticulo" class="p-2 bg-green-500 hover:bg-green-800 rounded-xl">
                Editar
            </button>
            <button wire:click="cerrarModalUpdate" class="p-2 bg-red-500 hover:bg-red-800 rounded-xl">
                Volver
            </button>
        </x-slot>
    </x-dialog-modal>
</x-self.base>