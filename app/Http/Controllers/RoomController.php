<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $room = Room::find($id);
        return view('room.index')->with('room',$room);
    }

    public function addpage(){
        return view('room.add');
    }

    public function store(Request $request)
    {   
        $this->validate($request,[
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'floor' => 'required',
            'type' => 'required',
            'status' => 'required',
            'room'=>'required',
            'description'=>'required'
        ]);

        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('img'), $imageName);

        $room = new Room;

        $room->photo = $imageName;
        $room->floor_number = $request->floor;
        $room->room_type = $request->type;
        $room->room_number = $request->room;
        $room->room_description = $request->description;
        $room->room_status = $request->status;
        $room->user_id = Auth::user()->id;

        $room->save();

        return Redirect::route('home')->with('success','Room Added');

    }

    public function editpage($id){
        $room = Room::find($id);
        if(is_null($room)) abort(404);

        return view('room.edit')->with('room',$room);
    }

    public function edit(Request $request,$id){

        $room = Room::find($id);
        if(is_null($room)) abort(404);

        $this->validate($request,[
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'floor' => 'required',
            'type' => 'required',
            'status' => 'required',
            'room'=>'required',
            'description'=>'required'
        ]);

        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('img'), $imageName);

        $room->photo = $imageName;
        $room->floor_number = $request->floor;
        $room->room_type = $request->type;
        $room->room_number = $request->room;
        $room->room_description = $request->description;
        $room->room_status = $request->status;
        $room->user_id = Auth::user()->id;

        $room->save();

        return Redirect::route('home')->with('success','Room Edited Succesfully');

    }


    public function destroy($id){
        $room = Room::find($id);
        if(is_null($room)) abort(404);

        $room->delete();

        return Redirect::route('home')->with('success','Room is Deleted');
    }
}
