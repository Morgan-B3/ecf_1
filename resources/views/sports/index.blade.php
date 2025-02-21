<x-layout :show="false">
    <x-slot:heading >
        FitLife
    </x-slot:heading>
    @foreach ($sports as $sport)
        <a class="bg-teal-700 hover:text-gray-800 hover:bg-teal-500 mx-2 px-2 py-1 rounded-full text-white" href="/sports/{{$sport->id}}">{{$sport->name}}</a>
    @endforeach
</x-layout>
