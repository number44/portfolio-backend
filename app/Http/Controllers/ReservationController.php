<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('reservations')->orderBy('id')->get();
        return Reservation::orderBy('id')->get();
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
            'icon' => 'required',
            'icon.*' => 'mimes:jpeg,jpg,png,svg|max:2048'
        ]);
        if ($request->file('icon')->isValid()) {
            $file = $request->file('icon');
            $name = $file->getClientOriginalName();
            Storage::disk('local')->put('public/uploads/reservation/' . time() . '_'  . $name, $file->get());
            $url = url('/')  . '/storage/uploads/reservation/' . time() . '_' . $name;
            $reservation = new Reservation();
            $reservation->icon = $url;
            $reservation->title = $request->title;
            $reservation->etitle = $request->etitle;
            $reservation->text = $request->text;
            $reservation->etext = $request->etext;
            $reservation->save();
            return $reservation;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Reservation::findOrFail($id);
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
        $reservation = Reservation::findOrFail($id);
        if ($request->hasFile('icon')) {

            $request->validate([
                'icon' => 'required',
                'icon.*' => 'mimes:jpeg,jpg,png,svg|max:2048'
            ]);

            if ($request->file('icon')->isValid()) {
                Storage::delete("/public/uploads/reservation/" . basename($reservation->icon));
                $file = $request->file('icon');
                $name = $file->getClientOriginalName();
                Storage::disk('local')->put('public/uploads/reservation/' . time() . '_'  . $name, $file->get());
                $url = url('/')  . '/storage/uploads/reservation/' . time() . '_' . $name;
                $reservation->icon = $url;
            }
        }
        $reservation->title = $request->title;
        $reservation->etitle = $request->etitle;
        $reservation->text = $request->text;
        $reservation->etext = $request->etext;
        $reservation->save();
        return $reservation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        Storage::delete("/public/uploads/reservation/" . basename($reservation->icon));
        $reservation->delete();
    }
}
