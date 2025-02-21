<x-layout>
    <x-slot:heading>
        {{$user->name}}
    </x-slot:heading>
    <div class="mb-5 font-bold">
        <h2>Reservations :</h2>
    </div>
    @foreach ($bookings as $booking )
        <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}" id="booking-edit-form" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="flex items-center gap-5 py-1.5">
                <p>{{$booking->timeslot->sport->name}}</p>
                <p>{{$booking->timeslot->starts_at}}</p>
                <p>{{$booking->timeslot->ends_at}}</p>
                <input type="text" name="user_id" id="user_id" value="1" class="hidden">
                <button type="submit" class="text-red-500 text-sm font-bold">Supprimer</button>
            </div>
        </form>
    @endforeach
</x-layout>
