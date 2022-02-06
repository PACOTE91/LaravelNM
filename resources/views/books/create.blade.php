@extends("layouts.app")




@section('contenido')
    @if (session('mensaje'))
        <x-alerta>
            {{ session('mensaje') }}
        </x-alerta>
    @endif

    <div class="bg-gray-100 mx-auto max-w-6xl bg-white py-20 px-12 lg:px-24 shadow-xl mb-24">
        <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">


                <div class="md:w-1/2 px-3 m-auto mb-6 md:mb-0">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
                        Título Libro*
                    </label>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="company"
                        name="title" type="text" placeholder="Introduce el titulo">

                    @error('title')
                        <div>
                            <span class="text-red-500 text-xs italic">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>


                <div class="w-1/2 px-3 m-auto mb-6 ">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
                        Resumen*
                    </label>
                    <textarea class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="title"
                        name="resume"></textarea>

                    @error('resume')
                        <div>
                            <span class="text-red-500 text-xs italic">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>

                <div class="w-1/2 px-3 m-auto mb-6">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                        Precio*
                    </label>
                    <br>
                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                        id="application-link" name="price" type="text" placeholder="Precio...">
                    @error('price')
                        <div>
                            <span class="text-red-500 text-xs italic">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>

                <div class="w-1/2 px-3 m-auto mb-6">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                        Categoría*
                    </label>
                    <br>
                    <select class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                        id="application-link" name="category_id" type="text" placeholder="Precio...">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                    @error('category')
                        <div>
                            <span class="text-red-500 text-xs italic">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>


                <div class="w-1/2 px-3 m-auto mb-6">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                        Author* (Ctrl + Click para selecionar varios)
                    </label>
                    <br>
                    <select multiple class="md:w-full px-3 m-auto mb-6 md:mb-0" id="application-link" name="authors[]"
                        type="text" placeholder="Precio...">
                        @foreach ($authors as $author)
                            <option class="w-full" value="{{ $author->id }}">
                                {{ $author->name . ' ' . $author->surname }}
                            </option>
                        @endforeach

                    </select>
                    @error('author')
                        <div>
                            <span class="text-red-500 text-xs italic">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>

                <div class="w-1/2 px-3 m-auto mb-6">
                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                        Archivo imagen
                    </label>
                    <br>
                    <input multiple class="md:w-full px-3 m-auto mb-6 md:mb-0" id="application-link" name="image"
                        type="file" />

                    @error('image')
                        <div>
                            <span class="text-red-500 text-xs italic">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>

            </div>
            <div class="-mx-3 m-auto md:flex mt-2">
                <div class="md:w-full px-3">
                    <button
                        class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
                        Crear Libro
                    </button>
                </div>
            </div>
    </div>
    </form>
    </div>


@endsection
