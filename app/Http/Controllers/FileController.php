<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return File::all();
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
            'file' => 'required',

        ]);

        $file = new File();
        $uploaded =  $request->file('file');
        $name = $uploaded->getClientOriginalName();
        Storage::disk('local')->put('public/uploads/files/' . $name,   $uploaded->get());
        $url = url('/')  . '/storage/uploads/files/'  . $name;
        $file->name = $name;
        $file->url = $url;
        $file->save();
        return $file;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return File::findOrFail($id);
    }

    /**
     * Download Specific File.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $file = File::findOrFail($id);
        return Storage::download("/public/uploads/files/"    . $file->name);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        Storage::delete("/public/uploads/files/"    . $file->name);
        $file->delete();
        return [
            'message' => "success"
        ];
    }
}
