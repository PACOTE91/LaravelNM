@extends("layouts.app")




@section('contenido')
    @if (session('mensaje'))
        <x-alerta>
            {{ session('mensaje') }}
        </x-alerta>
    @endif

    <div class="bg-gray-100 mx-auto max-w-6xl bg-white py-20 px-12 lg:px-24 shadow-xl mb-24">
        <form method="post" action="{{ route('categories.update', $category) }}">
            @csrf
            @method("PUT")
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
                            Nombre Categoria*
                        </label>
                        <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                            id="company" name="name" type="text" value="{{ $category->name }}"
                            placeholder="Introduce el nombre">

                        @error('name')
                            <div>
                                <span class="text-red-500 text-xs italic">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
                            Descripcion*
                        </label>
                        <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="title"
                            name="description" type="text" value="{{ $category->description }}"
                            placeholder="Introduce descripcion">
                        @error('name')
                            <div>
                                <span class="text-red-500 text-xs italic">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                </div>


            </div>
            <div class="-mx-3 md:flex mt-2">
                <div class="md:w-full px-3">
                    <button
                        class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full"><i
                            class="fas fa-edit"></i>
                        Editar Categoría
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection
