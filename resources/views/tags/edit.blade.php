<x-app-layout>
    <x-self.base>
        <form action="{{route('tags.update', $tag->id)}}" method="POST" class="w-1/2 mx-auto bg-gray-800 p-2 rounded-xl">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-white">Nombre de la Etiqueta</label>
                <input type="text" id="name" name="name"value="{{@old('name', $tag->name)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                <x-input-error for="name"/>
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-white">Descripción (Opcional)</label>
                <textarea name="description" id="description" rows="5" cols="50">{{@old('description', $tag->description)}}</textarea>
                <x-input-error for="description"/>
            </div>
            <x-button type="submit" class="text-white p-2">Editar</x-button>
            <a href="{{route('tags.index')}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Volver</a>

        </form>
    </x-self.base>
</x-app-layout>