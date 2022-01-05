<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


use App\Models\Placetype;
use Illuminate\Http\Request;

class PlacetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Placetype::all();
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

        if( $request->file('icon')->isValid() ){
            $file = $request->file('icon');
            $name = $request->name;
            Storage::disk('local')->put('public/uploads/icons/'. time().'_'  . $name . "." . $file->getClientOriginalExtension(), $file->get());
            $url = url('/')  . '/storage/uploads/icons/' . time().'_' . $name . "." . $file->getClientOriginalExtension();  
            $placetype = new Placetype();
            $placetype->icon = $url;
            $placetype->name = $request->name;
            $placetype->ename = $request->ename;
            $placetype->save();
            return $placetype;
        }
        
        return Placetype::all();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Placetype::findOrFail($id);
        
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
        $placetype  = Placetype::findOrFail($id);
        if($request->hasFile('icon')){

        $request->validate([
            'icon' => 'required',
            'icon.*' => 'mimes:jpeg,jpg,png,svg|max:2048'
        ]);
          
        if($request->file('icon')->isValid() ){
            Storage::delete("/public/uploads/icons/". basename($placetype->icon));
            $file = $request->file('icon');
            $name = $request->file('icon')->hashName();
            Storage::disk('local')->put('public/uploads/icons/' . $name, $file->get());
            $url = url('/')  . '/storage/uploads/icons/' . $name; 
            $placetype->icon = $url;
        }
    }
            $placetype->name = $request->name;
            $placetype->ename = $request->ename;
    
            $placetype->save();

        return $placetype;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $placetype = Placetype::findOrFail($id);
        Storage::delete("/public/uploads/icons/". basename($placetype->icon));
        $placetype->delete();
        return [
            'message'=> 'success'
        ];
        
    }
}
