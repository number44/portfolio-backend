<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Picture::all();
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
            'picture' => 'required',
            'picture.*' => 'mimes:jpeg,jpg,png,svg|max:2048'
        ]);

        $file = $request->file('picture');
        // $name = $request->file('picture')->hashName();
        $name = $request->name  . time() . "." . $file->getClientOriginalExtension();
        $picture = new Picture();
        $picture->name = $name;
        $nameWebp = $request->name . time() . '.webp';

        Storage::disk('local')->put('public/uploads/pictures/' . $request->room_id  . '/'  . $name,   $file->get());
        $url = url('/')  . '/storage/uploads/pictures/' . $request->room_id  . '/'   . $name;
        $picture->picture = $url;

        $imgFile = Image::make($file->getRealPath());
        $imgFile->backup();
        $img_xs = $imgFile->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('webp')->encode('webp')->save();
        Storage::disk('local')->put('public/uploads/pictures/' . $request->room_id . '/' . 'xs' . '/'  . $nameWebp, $img_xs);
        $url_xs = url('/')  . '/storage/uploads/pictures/' . $request->room_id . '/' . 'xs' . '/'   . $nameWebp;
        $picture->picture_xs = $url_xs;
        $imgFile->reset();

        $img_sm = $imgFile->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('webp')->save();
        Storage::disk('local')->put('public/uploads/pictures/' . $request->room_id . '/' . 'sm' . '/'  . $nameWebp, $img_sm);
        $url_sm = url('/')  . '/storage/uploads/pictures/' . $request->room_id . '/' . 'sm' . '/'   . $nameWebp;
        $picture->picture_sm = $url_sm;

        $imgFile->reset();

        $img_md = $imgFile->resize(640, 640, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('webp')->save();
        Storage::disk('local')->put('public/uploads/pictures/' . $request->room_id . '/' . 'md' . '/'  . $nameWebp, $img_md);
        $url_md = url('/')  . '/storage/uploads/pictures/' . $request->room_id . '/' . 'md' . '/'   . $nameWebp;
        $picture->picture_md = $url_md;

        $imgFile->reset();

        $img_lg = $imgFile->resize(1024, 1024, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('webp')->save();
        Storage::disk('local')->put('public/uploads/pictures/' . $request->room_id . '/' . 'lg' . '/'  . $nameWebp, $img_lg);
        $url_lg = url('/')  . '/storage/uploads/pictures/' . $request->room_id . '/' . 'lg' . '/'   . $nameWebp;
        $picture->picture_lg = $url_lg;

        $imgFile->reset();

        $picture->room_id = $request->room_id;
        $picture->save();

        return $picture;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picture = Picture::findOrFail($id);
        $name = basename($picture->picture);
        $nameWebp = basename($picture->picture_sm);
        Storage::delete("/public/uploads/pictures/" .  $picture->room_id . '/'   . $name);

        Storage::delete("/public/uploads/pictures/" .  $picture->room_id . '/' . 'xs' . '/'  . $nameWebp);
        Storage::delete("/public/uploads/pictures/" .  $picture->room_id . '/' . 'sm' . '/'  . $nameWebp);
        Storage::delete("/public/uploads/pictures/" .  $picture->room_id . '/' . 'md' . '/'  . $nameWebp);
        Storage::delete("/public/uploads/pictures/" .  $picture->room_id . '/' . 'lg' . '/'  . $nameWebp);

        // Storage::delete("/public/uploads/pictures/" .  $picture->room_id . '/'  . basename($picture->name));


        $picture->delete();
        return Picture::all();
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
