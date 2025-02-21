<x-layout>
    <x-slot:heading>
        {{$sport->name}}
    </x-slot:heading>
    <div class="mb-5">
        <p>{{$sport->description}}</p>
    </div>
    @foreach ($sport->timeslots as $timeslot )
    <div class="flex gap-5">
        <p>{{$timeslot->starts_at}} - {{$timeslot->ends_at}} - {{($timeslot->capacity - $timeslot->bookings->count())}} places restantes</p>
        <a href="/timeslot/{{$timeslot->id}}/book">Réserver</a>
    </div>
    @endforeach
        <a class="bg-teal-700 hover:text-gray-800 hover:bg-teal-500 mx-2 px-2 py-1 rounded-full text-white" href="/sports/{{ $sport->id }}/edit">
            Modifier
        </a>
</x-layout>
