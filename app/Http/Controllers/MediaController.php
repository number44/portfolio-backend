<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('media')->orderBy('id')->get();
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
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,svg|max:2048'
        ]);

        $file = $request->file('image');
        // $name = $request->file('picture')->hashName();
        $name = $request->name  . time() . "." . $file->getClientOriginalExtension();
        $picture = new Media();
        $picture->name = $name;
        $nameWebp = $request->name . time() . '.webp';

        Storage::disk('local')->put('public/uploads/media/'   . $name,   $file->get());
        $url = url('/')  . '/storage/uploads/media/'    . $name;
        $picture->picture = $url;

        $imgFile = Image::make($file->getRealPath());
        $imgFile->backup();

        $img_xs = $imgFile->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('webp')->encode('webp')->save();
        Storage::disk('local')->put('public/uploads/media/' . 'xs' . '/'  . $nameWebp, $img_xs);
        $url_xs = url('/')  . '/storage/uploads/media/' . 'xs' . '/'   . $nameWebp;
        $picture->picture_xs = $url_xs;
        $imgFile->reset();

        $img_sm = $imgFile->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('webp')->save();
        Storage::disk('local')->put('public/uploads/media/' . 'sm' . '/'  . $nameWebp, $img_sm);
        $url_sm = url('/')  . '/storage/uploads/media/' . 'sm' . '/'   . $nameWebp;
        $picture->picture_sm = $url_sm;

        $imgFile->reset();

        $img_md = $imgFile->resize(640, 640, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('webp')->save();
        Storage::disk('local')->put('public/uploads/media/' . 'md' . '/'  . $nameWebp, $img_md);
        $url_md = url('/')  . '/storage/uploads/media/' . 'md' . '/'   . $nameWebp;
        $picture->picture_md = $url_md;

        $imgFile->reset();

        $img_lg = $imgFile->resize(1024, 1024, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('webp')->save();
        Storage::disk('local')->put('public/uploads/media/' . 'lg' . '/'  . $nameWebp, $img_lg);
        $url_lg = url('/')  . '/storage/uploads/media/' . 'lg' . '/'   . $nameWebp;
        $picture->picture_lg = $url_lg;

        $imgFile->reset();

        $picture->save();
        return $picture;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $picture = Media::findOrFail($id);
        $name = basename($picture->picture);
        $nameWebp = basename($picture->picture_sm);
        Storage::delete("/public/uploads/media/"    . $name);

        Storage::delete("/public/uploads/media/"  . 'xs' . '/'  . $nameWebp);
        Storage::delete("/public/uploads/media/"  . 'sm' . '/'  . $nameWebp);
        Storage::delete("/public/uploads/media/"  . 'md' . '/'  . $nameWebp);
        Storage::delete("/public/uploads/media/"  . 'lg' . '/'  . $nameWebp);

        // Storage::delete("/public/uploads/pictures/" .  $picture->room_id . '/'  . basename($picture->name));


        $picture->delete();
        return Media::all();
    }
}
