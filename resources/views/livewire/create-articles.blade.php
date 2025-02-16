<div>
    <x-button wire:click="abrirModal">
        <i class="fas fa-add text-white mr-1"></i>Nuevo
    </x-button>
    <x-dialog-modal wire:model="abrirModalCrear">
        <x-slot name="title">
            Crear Artículo
        </x-slot>
        <x-slot name="content">
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Título del Artículo</label>
                <input type="text" id="title" wire:model="cform.title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                <x-input-error for="cform.title"/>
            </div>
            <div class="mb-5">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Contenido del Artículo</label>
                <textarea name="content" wire:model="cform.content" id="content" rows="5" cols="50"></textarea>
                <x-input-error for="cform.content"/>
            </div>
            <div class="mb-5">
                <label for="tag_id" class="block mb-2 text-sm font-medium text-gray-900">Etiqueta del Artículo</label>
                <select name="tag_id" id="tag_id" wire:model="cform.tag_id">
                    <option value="">Selecciona una Etiqueta</option>
                    @foreach($tags as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <x-input-error for="cform.tag_id"/>
            </div>

        </x-slot>
        <x-slot name="footer">
            <button type="submit" wire:click="store" class="p-2 bg-green-500 hover:bg-green-800 rounded-xl">
                Crear
            </button>
            <button wire:click="cerrarCrear" class="p-2 bg-red-500 hover:bg-red-800 rounded-xl">
                Volver
            </button>
        </x-slot>
    </x-dialog-modal>
</div>