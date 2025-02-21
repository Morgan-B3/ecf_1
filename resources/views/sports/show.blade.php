<x-layout>
    <x-slot:heading>
        {{$sport->name}}
    </x-slot:heading>
    <div class="mb-5">
        <p>{{$sport->description}}</p>
    </div>
    @foreach ($sport->timeslots as $timeslot )
    <div class="flex items-center gap-5 py-1.5">
        <p>{{$timeslot->starts_at}} - {{$timeslot->ends_at}} - {{($timeslot->capacity - $timeslot->bookings->count())}}/{{$timeslot->capacity}} places restantes</p>
        <a href="/timeslot/{{$timeslot->id}}/book" class="text-green-500 text-sm font-bold">Réserver</a>
    </div>
    @endforeach
        <a class="bg-teal-700 hover:text-gray-800 hover:bg-teal-500 mx-2 px-2 py-1 rounded-full text-white" href="/sports/{{ $sport->id }}/edit">
            Modifier
        </a>
</x-layout>
