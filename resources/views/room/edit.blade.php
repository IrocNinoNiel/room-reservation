@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('room.edit',$room->id)}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="photo">Enter Room Photo</label>
                            <input type="file" name="photo" class="form-control @error('photo') border-danger @enderror">
                        </div>

                        <div class="form-group">
                            <label for="floor">Enter Floor Number</label>
                            <input type="number" class="form-control @error('floor') border-danger @enderror" id="floor" placeholder="Floor Number" name="floor" value="{{$room->floor_number}}">
                        </div>

                        <div class="form-group">
                            <label for="type">Choose Room Type</label>
                            <select class="form-select form-control" aria-label="Default select example" id="type" name="type">
                                <option value="Single Room" @if($room->room_type == 'Single Room') selected @endif>Single Room</option>
                                <option value="Double Room" @if($room->room_type == 'Double Room') selected @endif>Double Room</option>
                                <option value="Triple Room" @if($room->room_type == 'Triple Room') selected @endif>Triple Room</option>
                                <option value="Quad Room" @if($room->room_type == 'Quad Room') selected @endif>Quad Room</option>
                                <option value="Queen Room" @if($room->room_type == 'Queen Room') selected @endif>Queen Room</option>
                                <option value="King Room" @if($room->room_type == 'King Room') selected @endif>King Room</option>
                                <option value="Twin Room" @if($room->room_type == 'Twin Room') selected @endif>Twin Room</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="room">Enter Room Number</label>
                            <input type="number" class="form-control @error('room') border-danger @enderror" id="room" placeholder="Floor Number" name="room" value="{{$room->room_number}}">
                        </div>

                        <div class="form-group">
                            <label for="status">Room Status</label>
                            <select class="form-select form-control" aria-label="Default select example" id="status" name="status">
                                <option value="1" @if($room->room_status == 1) selected @endif>Available</option>
                                <option value="2" @if($room->room_status == 2) selected @endif>Not Available</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Enter Room Description</label>
                            <textarea class="form-control @error('description') border-danger @enderror" id="description" rows="5" placeholder="Room Description" name="description">{{$room->room_description}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Add Room</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
