@extends("layouts.app")




@section('contenido')
    @if (session('mensaje'))
        <x-alerta>
            {{ session('mensaje') }}
        </x-alerta>
    @endif

    <div class="bg-gray-100 mx-auto w-9/12 py-20 px-12 lg:px-24 shadow-xl mb-24">
        <form method="post" action="{{ route('mail.send') }}">
            @csrf
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                <div>
                    <div class="md:w-full px-3 mb-6 md:mb-0">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="company">
                            Name *
                        </label>
                        <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                            id="company" name="name" type="text" placeholder="Introduce tu nombre">

                        @error('name')
                            <div>
                                <span class="text-red-500 text-xs italic">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                    <div class="md:w-full px-3">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
                            Apellidos*
                        </label>
                        <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="title"
                            name="surname" type="text" placeholder="Introduce Apellidos">
                        @error('surname')
                            <div>
                                <span class="text-red-500 text-xs italic">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>

                    <div class="md:w-ful px-3">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
                            E-mail*
                        </label>
                        <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                            id="title" name="email" type="text" placeholder="Introduce E-Mail">
                        @error('email')
                            <div>
                                <span class="text-red-500 text-xs italic">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>


                    <div class="md:w-full px-3">
                        <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
                            Sugerencias *
                        </label>
                        <textarea class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                            id="title" name="suggest"></textarea>
                        @error('suggest')
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
                        class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
                        Enviar
                    </button>
                </div>
            </div>
    </div>
    </form>
    </div>


@endsection
