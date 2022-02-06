@extends("layouts.app")

@section('contenido')

    @if (session('mensaje'))
        <x-alerta>
            {{ session('mensaje') }}
        </x-alerta>
    @endif

    <a class="p-4 mx-16 my-8 block w-52 bg-orange-500 hover:bg-orange-200" href="{{ route('categories.create') }}"><i
            class="fas fa-plus"></i>
        Crear Categoria
    </a>

    @if (count($categories) == 0)
        <div class="text-center capitalize italic text-xl text-gray-600 block m-auto w-full mt-8">
            <p class="rounded bg-slate-300 p-4 w-4/6 m-auto">No hay registros para mostrar...</p>
        </div>

    @else
        <table class="w-9/12 mx-auto mt-8">
            <thead class="w-full text-left">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Editar</th>
                    <th>Borrar</th>

                </tr>
            </thead>
            <tbody class="w-full">
                @foreach ($categories as $category)

                    <tr>
                        <td class="m-4">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <div class="text-sm opacity-50">
                                        {{ $category->id }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="m-4">
                            {{ $category->name }}
                        </td>
                        <td class="m-4">
                            {{ $category->description }}
                        </td>

                        <td class="m-4 flex items-stretch">
                            <a href="{{ route('categories.edit', $category) }}"
                                class="w-1/2 p-4 bg-slate-500 hover:bg-slate-200 rounded-md"><i class="fas fa-edit"></i>
                                Editar</a>
                        </td>

                        <td class="m-4 items-stretch">
                            <form action="{{ route('categories.destroy', $category) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method("DELETE")
                                <button class="bg-red-500 hover:bg-red-300 p-4 rounded-md block"><i
                                        class="fas fa-trash-alt"></i> Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $categories->links() }}

    @endif



@endsection
