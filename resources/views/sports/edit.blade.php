<x-layout>
    <x-slot:heading>
        Modifier {{$sport->name}}
    </x-slot:heading>

    <form method="post" action="/sports/{{ $sport->id }}" id="sport-edit-form" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Intitulé</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6"></div>
                                <input type="text" name="name" id="name" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Nom du sport" value="{{ $sport->name }}">
                            </div>
                            @error('name')
                            <p class="text-red-500 text-xs font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6"></div>
                                <textarea type="text" name="description" id="description" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Un super sport ! :)"  value="{{ $sport->description }}" >{{ $sport->description }}</textarea>
                            </div>
                            @error('description')
                            <p class="text-red-500 text-xs font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>

                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 italic">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">

            <button form="delete-form" class="text-red-500 text-sm font-bold">Supprimer</button>
            <a class="text-sm/6 font-semibold text-gray-900" href="/sports/{{$sport->id}}">Annuler</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enregistrer</button>
        </div>
    </form>

    {{-- Modification des timeslots --}}
    <div class="">
        <p class="block text-sm/6 font-medium text-gray-900">Créneaux affichés</p>
        @foreach ($sport->timeslots as $timeslot )
        <form method="POST" action="{{ route('timeslots.update', $timeslot->id) }}" id="timeslot-edit-form" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="flex items-center gap-5 py-1.5">
                <div class="flex items-center gap-5">
                    <label for="starts_at">Début</label>
                    <input type="time" name="starts_at" id="starts_at" class="block min-w-0  py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="{{ $timeslot->starts_at }}">
                </div>
                <div class="flex items-center gap-5">
                    <label for="ends_at">Fin</label>
                    <input type="time" name="ends_at" id="ends_at" class="block min-w-0 py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="{{ $timeslot->ends_at }}">
                </div>
                <div class="flex items-center gap-5">
                    <label for="capacity">Places :</label>
                    <input type="number" name="capacity" id="capacity" class="w-10" value="{{ $timeslot->capacity }}">
                </div>
                <input type="text" name="sport_id" id="sport_id" value="{{ $sport->id }}" class="hidden">
                <button type="submit" class="text-green-500 text-sm font-bold" type="submit" form="timeslot-edit-form">Modifier</button>
                <button form="timeslot-delete-form" class="text-red-500 text-sm font-bold" type="submit">Supprimer</button>
            </div>
        </form>

        {{-- Suppression d'un timeslot --}}
        <form method="POST" action="{{ route('timeslots.destroy', $timeslot->id) }}" id="timeslot-delete-form" class="hidden" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
        </form>
        @endforeach
    </div>
        {{-- Ajout d'un timeslot --}}
    <div>
        <p class="block text-sm/6 font-medium text-gray-900">Ajouter un créaneau</p>
        <form method="POST" id="timeslot-create-form" action="/timeslots" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center gap-5 py-1.5">
                <div class="flex items-center gap-5">
                    <label for="starts_at">Début</label>
                    <input type="time" name="starts_at" id="starts_at" class="block min-w-0  py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="">
                </div>
                <div class="flex items-center gap-5">
                    <label for="ends_at">Fin</label>
                    <input type="time" name="ends_at" id="ends_at" class="block min-w-0 py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="">
                </div>
                <div class="flex items-center gap-5">
                    <label for="capacity">Places :</label>
                    <input type="number" name="capacity" id="capacity" class="w-10" value="">
                </div>
                <input type="text" name="sport_id" id="sport_id" value="{{ $sport->id }}" class="hidden">
                <button type="submit" form="timeslot-create-form" class="text-green-500 text-sm font-bold" type="submit">Ajouter</button>
            </div>
        </form>
    </div>

    <form method="POST" action="/sports/{{$sport->id}}" id="delete-form" class="hidden" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
    </form>


</x-layout>
