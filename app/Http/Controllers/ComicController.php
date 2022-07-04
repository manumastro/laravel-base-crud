<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|max:50|min:5',
                'image' => 'required|max:255|min:10',
                'type' => 'required|max:25|min:3',
            ],
            [
                'title.required' => 'Il campo titolo è obbligatorio',
                'title.max' => 'Il campo titolo deve avere al massimo :max caratteri',
                'title.min' => 'Il campo titolo deve avere minimo :min caratteri',
                'image.required' => 'Il campo image è obbligatorio',
                'image.max' => 'Il campo image deve avere al massimo :max caratteri',
                'image.min' => 'Il campo image deve avere minimo :min caratteri',
                'type.required' => 'Il campo type è obbligatorio',
                'type.max' => 'Il campo type deve avere al massimo :max caratteri',
                'type.min' => 'Il campo type deve avere minimo :min caratteri',
            ]
        );

        $data = $request->all();

        $newComic = new Comic();
        // $newComic->title = $data['title'];
        // $newComic->slug = Str::slug($data['title'], '-');
        // $newComic->image = $data['image'];
        // $newComic->type = $data['type'];
        $data['slug'] = Str::slug($data['title'], '-');

        $newComic->fill($data);
        $newComic->save();

        return redirect()->route('Comics.show', $newComic->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.show', compact('comic'));
        }
        abort(404, 'Comic non presente nel database');

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.edit', compact('comic'));
        }
        abort(404, 'Comic non presente nel database');
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
        //dd($request->all(), $comic);
        //$comic = Comic::find($id);
        $comic = Comic::find($id);

        $request->validate(
            [
                'title' => 'required|max:50|min:5',
                'image' => 'required|max:255|min:10',
                'type' => 'required|max:25|min:3',
            ],
            [
                'title.required' => 'Il campo titolo è obbligatorio',
                'title.max' => 'Il campo titolo deve avere al massimo :max caratteri',
                'title.min' => 'Il campo titolo deve avere minimo :min caratteri',
                'image.required' => 'Il campo image è obbligatorio',
                'image.max' => 'Il campo image deve avere al massimo :max caratteri',
                'image.min' => 'Il campo image deve avere minimo :min caratteri',
                'type.required' => 'Il campo type è obbligatorio',
                'type.max' => 'Il campo type deve avere al massimo :max caratteri',
                'type.min' => 'Il campo type deve avere minimo :min caratteri',
            ]
        );

        $data = $request->all();
        
        $data['slug'] = Str::slug($data['title'], '-');

        $comic->update($data);

        return redirect()->route('Comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $comic = Comic::find($id);
        
        $comic->delete();

        return redirect()->route('Comics.index')->with('prodotto_cancellato', "Il Comic $comic->title è stato cancellato correttamente");
    }
}
