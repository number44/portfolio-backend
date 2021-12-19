<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Image::all();
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
            'photo' => 'required',
            'photo.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        if( $request->file('photo')->isValid() ){
            $file = $request->file('photo');
            $name = $request->file('photo')->hashName();
            Storage::disk('local')->put('public/uploads/' . $name, $file->get());
            $url = url('/')  . '/storage/uploads/' . $name; 
            $image = new Image();
            $image->url = $url;
            $image->name = $file->getClientOriginalName();
            $image->alt = $file->getClientOriginalName();
            $image->path = ('public/uploads/' .   $name );
            $image->size = $file->getSize();
            $image->save();
            return $image;
        }
        
        return Image::all();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Image::findOrFail($id);
        
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
        $image = Image::findOrFail($id);
        if($request->hasFile('photo')){

        $request->validate([
            'photo' => 'required',
            'photo.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
        $image = new Image();
          
        if($request->file('photo')->isValid() ){
            Storage::delete($image->path);
            $file = $request->file('photo');
            $name = $request->file('photo')->hashName();
            Storage::disk('local')->put('public/uploads/' . $name, $file->get());
            $url = url('/')  . '/storage/uploads/' . $name; 
            $image->url = $url;
            $image->name = $file->getClientOriginalName();
            $image->path = ('public/uploads/' .   $name );
            $image->size = $file->getSize();
        }
    }
    
        $image->alt = $request->alt;
        $image->save();

        return $image;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        Storage::delete($image->path);
        $image->delete();
        return [
            'message'=> 'success'
        ];
        
    }
}
