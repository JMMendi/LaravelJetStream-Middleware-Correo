<x-app-layout>
    <x-self.base>
        <button  class="bg-black text-white p-1 rounded-xl">
            <a href="{{route('tags.create')}}">
                <i class="fas fa-add mr-1"></i>Nuevo
            </a>
        </button>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripción
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha Creación
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->name}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->description}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->created_at}}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{route('tags.destroy', $item->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash text-gray-500 hover:text-2xl"></i>
                                </button>
                                <a href="{{route('tags.edit', $item->id)}}">
                                    <i class="fas fa-edit text-green-500 hover:text-2xl"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-self.base>
    @session('mensaje')
    <script>
        Swal.fire({
            icon: "success",
            title: "{{session('mensaje')}}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endsession
</x-app-layout>