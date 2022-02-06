@extends("layouts.app")




@section('contenido')
    @if (session('mensaje'))
        <x-alerta>
            {{ session('mensaje') }}
        </x-alerta>
    @endif

    <a class="p-4 mx-16 my-8 block w-52 bg-orange-500 hover:bg-orange-200" href="{{ route('books.create') }}"><i
            class="fas fa-plus"></i>
        Crear Libro
    </a>


    @if (count($books) == 0)
        <div class="text-center capitalize italic text-xl text-gray-600 block m-auto w-full mt-8">
            <p class="rounded bg-slate-300 p-4 w-4/6 m-auto">No hay registros para mostrar...</p>
        </div>
    @else

        <table class="w-11/12 mx-auto mt-8">
            <thead class="w-full text-left">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Detalles
                    </th>
                    <th>Titulo</th>
                    <th>Resumen</th>
                    <th>Precio</th>
                    <th>Editar</th>
                    <th>Borrar</th>

                </tr>
            </thead>
            <tbody class="w-full">
                @foreach ($books as $book)

                    <tr>
                        <td class="m-4">
                            <div class="text-sm opacity-50">
                                <span>{{ $book->id }}</span>
                            </div>

                        </td>
                        <td class="m-4 mx-auto text-center">
                            <a class="text-center" href="{{ route('books.show', $book) }}">
                                <img class="rounded-full inline w-10 hover:scale-125"
                                    src="{{ Storage::url($book->image) }}" alt="Avatar Tailwind CSS Component">
                            </a>

                        </td>
                        <td class="m-4">
                            {{ $book->title }}
                        </td>
                        <td class="m-4">
                            {{ $book->resume }}
                        </td>

                        <td class="m-4 bold ">
                            {{ $book->price }} €
                        </td>
                        <td class="m-4">
                            <a href="{{ route('books.edit', $book) }}"
                                class="btn btn-ghost btn-xs p-2 bg-slate-500 hover:bg-slate-200 rounded-md"><i
                                    class="fas fa-edit"></i>


                                Editar</a>
                        </td>

                        <td class="m-8">
                            <form action="{{ route('books.destroy', $book) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-ghost btn-xs p-2 bg-red-500 hover:bg-red-300 rounded-md"><i
                                        class="fas fa-trash-alt"></i> Borrar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="mt-8 mx-auto w-1/2">
            @if (!is_array($books))
                {{ $books->links() }}
            @endif
        </div>
    @endif

@endsection
