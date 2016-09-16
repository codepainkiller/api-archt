<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddPhotoRequest;
use App\Http\Requests\PlaceRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Place;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::with('category')->paginate(20);

        return view('admin.places.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PlaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaceRequest $request)
    {
        Place::create($request->all());

        session()->flash('flash_message', 'Lugar turístico registrado!.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::with('category', 'photos', 'audios')->findOrFail($id);

        return view('admin.places.show', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::findOrFail($id);

        return view('admin.places.edit', compact('place'));
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
        $place = Place::findOrFail($id);

        $place->update($request->all());

        return redirect()->route('admin.place.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Place::findOrFail($id)->delete();

        return response('La categoria ha sido eliminada', 202);
    }

    public function addPhoto($id, AddPhotoRequest $request)
    {
        $place = Place::findOrFail($id);

        if ($place->photos->count() >= 9) {
            return response('Limite de fotos excedido.', 403);
        }

        $photo = $this->makePhoto($request->file('photo'));
        $place->addPhoto($photo);

        return response('La foto ha sido agregada!', 201);
    }

    protected function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName())
                ->move($file);
    }
}
