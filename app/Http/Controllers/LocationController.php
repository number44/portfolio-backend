<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LocationResource::collection(Location::all());
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
            $location = new Location();
            $location->thumbnail = $url;
            $location->name = $request->name;
            $location->ename = $request->ename;
            $location->lat = $request->lat;
            $location->lon = $request->lon;
            $location->save();
            return $location;
        };

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = new LocationResource(Location::findOrFail($id));
        return $location;
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
        $location = Location::findOrFail($id);
        $request->validate([
            'thumbnail' => 'required',
            'thumbnail.*' => 'mimes:jpeg,jpg,png,svg|max:2048'
        ]);
         if($request->file('thumbnail')->isValid()){
            Storage::delete("/public/uploads/thumbnails/". basename($location->thumbnail));
            $file = $request->file('thumbnail');
            $name = $request->file('thumbnail')->hashName();
            Storage::disk('local')->put('public/uploads/thumbnails/' . $name , $file->get());
            $url = url('/') . '/storage/uploads/thumbnails/' . $name;
            $location->thumbnail = $url;

            
         }  

        $location->name = $request->name;
        $location->ename = $request->ename;
        $location->lat = $request->lat;
        $location->lon = $request->lon;
        $location->save();
        
        return $location;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        Storage::delete("/public/uploads/thumbnails/". basename($location->thumbnail));
        $location->delete();
        return [
            'message'=> 'success'
        ];

    }
}
