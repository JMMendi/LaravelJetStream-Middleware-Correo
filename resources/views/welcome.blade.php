<x-app-layout>
    <x-self.base>
        

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Titulo
                </th>
                <th scope="col" class="px-6 py-3">
                    Contenido
                </th>
                <th scope="col" class="px-6 py-3">
                    Usuario
                </th>
                <th scope="col" class="px-6 py-3">
                    Tags
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
                    {{$item->user->email}}
                </td>
                <td class="px-6 py-4">
                    {{$item->tag->name}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-2">
    {{$articulos->links()}}
</div>

    </x-self.base>
</x-app-layout>