<x-layout>
    <x-slot:heading>
        {{$sport->name}}
    </x-slot:heading>
    <div class="mb-5">
        <p>{{$sport->description}}</p>
    </div>
    @foreach ($sport->timeslots as $timeslot )
        <form method="POST" action="{{ route('bookings.store', $timeslot->id) }}" id="timeslot-edit-form" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center gap-5 py-1.5">
                <p>{{$timeslot->starts_at}} - {{$timeslot->ends_at}} - {{($timeslot->capacity - $timeslot->bookings->count())}}/{{$timeslot->capacity}} places restantes</p>
                <input type="text" name="timeslot_id" id="timeslot_id" value="{{ $timeslot->id }}" class="hidden">
                <input type="text" name="user_id" id="user_id" value="1" class="hidden">
                <input type="text" name="sport_id" id="sport_id" value="{{ $sport->id }}" class="hidden">
                <button type="submit" class="text-green-500 text-sm font-bold">Réserver</button>
            </div>
        </form>
    @endforeach
        <a class="bg-teal-700 hover:text-gray-800 hover:bg-teal-500 mx-2 px-2 py-1 rounded-full text-white" href="/sports/{{ $sport->id }}/edit">
            Modifier
        </a>
</x-layout>
