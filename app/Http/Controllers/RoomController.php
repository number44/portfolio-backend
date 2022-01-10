<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoomResource::collection(Room::all()); 
        return Room::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required',
            'thumbnail.*' => 'mimes:jpeg,jpg,png,svg|max:2048'
        ]);
        if($request->file('thumbnail')->isValid()){
            $file = $request->file('thumbnail');
            $name = $request->file('thumbnail')->hashName();
            Storage::disk('local')->put('public/uploads/thumbnails/' . $name , $file->get());
            $url = url('/') . '/storage/uploads/thumbnails/' . $name;
            $room = new Room();
            $room->son_id =$request->son_id;
            $room->thumbnail = $url;
            $room->name = $request->name;
            $room->ename = $request->ename;
            $room->price = $request->price;
            $room->availability = $request->availability;
            $room->location_id = $request->location_id;
            $room->roomtype_id = $request->roomtype_id;
            
            $room->internet = $request->internet;
            $room->tv = $request->tv;
            $room->washing_machine = $request->washing_machine;
            $room->dryer = $request->dryer;
            $room->parking = $request->parking;
            $room->elevator = $request->elevator;
            $room->oven = $request->oven;
            $room->equipped_kitchen = $request->equipped_kitchen;

            $room->rooms = $request->rooms;
            $room->beds = $request->beds;
            $room->guests = $request->guests;
            $room->bathrooms = $request->bathrooms;


            $room->about = $request->about;
            $room->eabout = $request->eabout;

            $room->info = $request->info;
            $room->einfo = $request->einfo;

            $room->save();
            return $room;
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'thumbnail' => 'required',
            'thumbnail.*' => 'mimes:jpeg,jpg,png,svg|max:2048'
        ]);
        $room = Room::findOrFail($id);
        
        if( $request->hasFile('thumbnail') &&  $request->file('thumbnail')->isValid()  ){
            $file = $request->file('thumbnail');
            $name = $request->file('thumbnail')->hashName();
        
            Storage::delete("/public/uploads/icons/". basename($room->thumbnail));
        
            Storage::disk('local')->put('public/uploads/thumbnails/' . $name , $file->get());
            $url = url('/') . '/storage/uploads/thumbnails/' . $name;
            $room->thumbnail = $url;   
        }
            $room->son_id =$request->son_id;
            $room->name = $request->name;
            $room->ename = $request->ename;
            $room->price = $request->price;
            $room->availability = $request->availability;
            $room->location_id = $request->location_id;
            $room->roomtype_id = $request->roomtype_id;
            
            $room->internet = $request->internet;
            $room->tv = $request->tv;
            $room->washing_machine = $request->washing_machine;
            $room->dryer = $request->dryer;
            $room->parking = $request->parking;
            $room->elevator = $request->elevator;
            $room->oven = $request->oven;
            $room->equipped_kitchen = $request->equipped_kitchen;

            $room->rooms = $request->rooms;
            $room->beds = $request->beds;
            $room->guests = $request->guests;
            $room->bathrooms = $request->bathrooms;


            $room->about = $request->about;
            $room->eabout = $request->eabout;

            $room->info = $request->info;
            $room->einfo = $request->einfo;

            $room->save();
            return $room;
    }
   
   
   
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new RoomResource(Room::findOrFail($id));
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        /**
     * Search for  specified rooms.
     *
     * @param  \App\Models\Room  $note
     * @return \Illuminate\Http\Response
    */
    public function search($name)
    {
        return  RoomResource::collection(Room::where('name','ilike','%'.$name.'%')->get());
        return  Room::where('name','ilike','%'.$name.'%')->get();
        // return new NoteResource(Note::where('name', "like",'%'.$name."%" )->get());
    }



}