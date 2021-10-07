@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('room.store')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="photo">Enter Room Photo</label>
                            <input type="file" name="photo" class="form-control @error('photo') border-danger @enderror">
                        </div>

                        <div class="form-group">
                            <label for="floor">Enter Floor Number</label>
                            <input type="number" class="form-control @error('floor') border-danger @enderror" id="floor" placeholder="Floor Number" name="floor">
                        </div>

                        <div class="form-group">
                            <label for="type">Choose Room Type</label>
                            <select class="form-select form-control" aria-label="Default select example" id="type" name="type">
                                <option value="Single Room">Single Room</option>
                                <option value="Double Room">Double Room</option>
                                <option value="Triple Room">Triple Room</option>
                                <option value="Quad Room">Quad Room</option>
                                <option value="Queen Room">Queen Room</option>
                                <option value="King Room">King Room</option>
                                <option value="Twin Room">Twin Room</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="room">Enter Room Number</label>
                            <input type="number" class="form-control @error('room') border-danger @enderror" id="room" placeholder="Room Number" name="room">
                        </div>

                        <div class="form-group">
                            <label for="status">Room Status</label>
                            <select class="form-select form-control" aria-label="Default select example" id="status" name="status">
                                <option value="1">Available</option>
                                <option value="2">Not Available</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Enter Room Description</label>
                            <textarea class="form-control @error('description') border-danger @enderror" id="description" rows="5" placeholder="Room Description" name="description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Add Room</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
