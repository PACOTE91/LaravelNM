@extends("layouts.app")




@section('contenido')
    @if (session('mensaje'))
        <x-alerta>
            {{ session('mensaje') }}
        </x-alerta>
    @endif

    <div class="p-10 mx-auto">
        <!--Card 1-->
        <div class="w-1/2 mx-auto rounded overflow-hidden shadow-lg">
            <img class="w-2/4 text-center" src="{{ Storage::url("$book->image") }}" alt="Mountain">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $book->title }}</div>
                <p class="text-gray-700 text-base">
                    {{ $book->resume }}
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">

                <div class="my-8">
                    <span class="text-lg">Precio</span>

                    <br>

                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $book->price }}
                        €
                    </span>
                </div>

                <div class="my-8">
                    <p class="text-lg">Categoría</p>


                    <span
                        class="text-black inline-block bg-blue-300 hover:bg-blue-400 focus:ring-4 mr-2 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center mb-2 hover:scale-110 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"">

                                            @foreach ($category as $item)
                        <a href="{{ route('books.indexcat', $item) }}">{{ $item->name }}</a>
                        @endforeach
                    </span>



                </div>

                {{-- Autores --}}
                <div class="my-8">

                    <p class="text-lg">Autor/ es</p>
                    <div class="flex">


                        @foreach ($autores as $item)
                            <span
                                class="text-black hover:scale-110 bg-green-300 hover:bg-green-400 focus:ring-4 mr-2 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2 text-center mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <a href="{{ route('books.indexaut', $item) }}">{{ $item->name }}
                                    {{ $item->surname }}</a>
                            </span>
                        @endforeach

                    </div>

                </div>

                <div class="flex w-full items-center">


                    <div class="content-center">
                        <a href="{{ route('books.edit', $book) }}"
                            class="block text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-800 dark:border-gray-700"><i
                                class="fas fa-edit"></i>


                            Editar
                        </a>
                    </div>


                    <div class="content-center">
                        <form action="{{ route('books.destroy', $book) }}" method="post" enctype="multipart/form-data"
                            class="block">
                            @csrf
                            @method("DELETE")
                            <button
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i
                                    class="fas fa-trash-alt"></i> Borrar</button>
                        </form>
                    </div>

                </div>


            </div>


            <!--Card 3-->

        </div>
    </div>



@endsection
