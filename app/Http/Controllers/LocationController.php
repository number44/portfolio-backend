<?php



namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
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
        return DB::table('rooms')->orderByDesc('id')->get();

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
        if ($request->file('thumbnail')->isValid()) {
            $location = new Location();
            $file = $request->file('thumbnail');
            $name = $request->file('thumbnail')->hashName();
            $nameWebp = pathinfo($name, PATHINFO_FILENAME) . '.webp';

            Storage::disk('local')->put('public/uploads/thumbnails/' . $name, $file->get());
            $url = url('/') . '/storage/uploads/thumbnails/' . $name;


            $imgFile = Image::make($file->getRealPath());
            $imgFile->backup();

            $img_xs = $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp')->encode('webp')->save();
            Storage::disk('local')->put('public/uploads/thumbnails/' . 'xs' . '/'  . $nameWebp, $img_xs);
            $url_xs = url('/')  . '/storage/uploads/thumbnails/' . 'xs' . '/'   . $nameWebp;
            $location->thumbnail_xs = $url_xs;
            $imgFile->reset();

            $img_sm = $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp')->encode('webp')->save();
            Storage::disk('local')->put('public/uploads/thumbnails/' . 'sm' . '/'  . $nameWebp, $img_sm);
            $url_sm = url('/')  . '/storage/uploads/thumbnails/' . 'sm' . '/'   . $nameWebp;
            $location->thumbnail_sm = $url_sm;
            $imgFile->reset();

            $img_md = $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp')->encode('webp')->save();
            Storage::disk('local')->put('public/uploads/thumbnails/' . 'md' . '/'  . $nameWebp, $img_md);
            $url_md = url('/')  . '/storage/uploads/thumbnails/' . 'md' . '/'   . $nameWebp;
            $location->thumbnail_md = $url_md;
            $imgFile->reset();

            $img_lg = $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp')->encode('webp')->save();
            Storage::disk('local')->put('public/uploads/thumbnails/' . 'lg' . '/'  . $nameWebp, $img_lg);
            $url_lg = url('/')  . '/storage/uploads/thumbnails/' . 'lg' . '/'   . $nameWebp;
            $location->thumbnail_lg = $url_lg;
            $imgFile->reset();


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
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            Storage::delete("/public/uploads/thumbnails/" . basename($location->thumbnail));

            Storage::delete('public/uploads/thumbnails/' . 'xs' . '/ ' . basename($location->thumbnail_xs));
            Storage::delete('public/uploads/thumbnails/' . 'sm' . '/ ' . basename($location->thumbnail_xs));
            Storage::delete('public/uploads/thumbnails/' . 'md' . '/ ' . basename($location->thumbnail_xs));
            Storage::delete('public/uploads/thumbnails/' . 'lg' . '/ ' . basename($location->thumbnail_xs));

            $file = $request->file('thumbnail');
            $name = $request->file('thumbnail')->hashName();
            $nameWebp = pathinfo($name, PATHINFO_FILENAME) . '.webp';


            Storage::disk('local')->put('public/uploads/thumbnails/' . $name, $file->get());
            $url = url('/') . '/storage/uploads/thumbnails/' . $name;
            $location->thumbnail = $url;


            $imgFile = Image::make($file->getRealPath());
            $imgFile->backup();

            $img_xs = $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp')->encode('webp')->save();
            Storage::disk('local')->put('public/uploads/thumbnails/' . 'xs' . '/'  . $nameWebp, $img_xs);
            $url_xs = url('/')  . '/storage/uploads/thumbnails/' . 'xs' . '/'   . $nameWebp;
            $location->thumbnail_xs = $url_xs;
            $imgFile->reset();

            $img_sm = $imgFile->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp')->encode('webp')->save();
            Storage::disk('local')->put('public/uploads/thumbnails/' . 'sm' . '/'  . $nameWebp, $img_sm);
            $url_sm = url('/')  . '/storage/uploads/thumbnails/' . 'sm' . '/'   . $nameWebp;
            $location->thumbnail_sm = $url_sm;
            $imgFile->reset();

            $img_md = $imgFile->resize(640, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp')->encode('webp')->save();
            Storage::disk('local')->put('public/uploads/thumbnails/' . 'md' . '/'  . $nameWebp, $img_md);
            $url_md = url('/')  . '/storage/uploads/thumbnails/' . 'md' . '/'   . $nameWebp;
            $location->thumbnail_md = $url_md;
            $imgFile->reset();

            $img_lg = $imgFile->resize(1024, 1024, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp')->encode('webp')->save();
            Storage::disk('local')->put('public/uploads/thumbnails/' . 'lg' . '/'  . $nameWebp, $img_lg);
            $url_lg = url('/')  . '/storage/uploads/thumbnails/' . 'lg' . '/'   . $nameWebp;
            $location->thumbnail_lg = $url_lg;
            $imgFile->reset();
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
        Storage::delete("/public/uploads/thumbnails/" . basename($location->thumbnail));

        Storage::delete('public/uploads/thumbnails/' . 'xs' . '/' . basename($location->thumbnail_xs));
        Storage::delete('public/uploads/thumbnails/' . 'sm' . '/' . basename($location->thumbnail_xs));
        Storage::delete('public/uploads/thumbnails/' . 'md' . '/' . basename($location->thumbnail_xs));
        Storage::delete('public/uploads/thumbnails/' . 'lg' . '/' . basename($location->thumbnail_xs));

        $location->delete();
        return [
            'message' => 'success'
        ];
    }
}
