@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row p-3">
                    <div class="col-md-4">
                        <img src="{{asset("/img/".$room->photo)}}" class="thumbnail" style="max-width:100%;
                        max-height:100%;">
                    </div>
                    <div class="col-md-8">
                        <h2>Room# {{$room->room_number}}</h2>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Floor Number:</strong> {{$room->floor_number}}</li>
                            <li class="list-group-item"><strong>Room Type:</strong> {{$room->room_type}}</li>
                            <li class="list-group-item">
                                <strong>Status:</strong>
                                @if($room->room_status == 1)
                                    <button class="btn btn-primary">Available</button>
                                @else
                                    <button class="btn btn-danger">Unavailable</button>
                                @endif
                            </li>
                            <li class="list-group-item"><strong>Description: </strong> {{$room->room_description}}</li>
                        </ul>
                    </div>
                </div>
                <hr>

                @if(Auth::user()->user_type == 'admin')
                    <div class="row p-3">
                        <div class="col">
                            <a href="{{ route('room.editpage', $room->id) }}" class="btn btn-primary">Edit Room</a>
                        </div>
                        <div class="col text-right">
                            <form action="{{ route('room.destroy', $room->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete this Room?');">
                            </form>
                        </div>
                    </div>
                @endif
               
            </div>
        </div>
    </div>
</div>
@endsection
