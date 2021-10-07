@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            {{ __('Room List') }}
                        </div>
                        @if(Auth::user()->user_type == 'admin')
                            <div class="col text-right">
                                <a href="{{route('room.addpage')}}" class="btn btn-primary">Add Room</a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    @include('inc.message')
                    <div class="container">
                        <div class="row" id="room" style="height: 390px;">
                            @foreach ($rooms as $room)
                                <div class="col-md-3 border mt-2 mb-2 pt-3 pb-3">
                                    <div class="well text-center">
                                        <img src="{{asset("/img/".$room->photo)}}" style="max-width:100%;
                                        height:240px;">
                                    <h5 class="mt-3">Room #{{$room->room_number}}</h5>
                                    <a class="btn btn-primary" href="{{ route('room.index',$room->id)}}">Room Details</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
