<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Comic;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('type');
        if($search) {
            $comics = Comic::where('type', $search)->get();
        } else {
            $comics = Comic::all();
        }
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
        $request->validate([
            'title' => 'required|unique:comics|max:255|min:5',
            'description' => 'required|unique:comics,description',
            'thumb' => 'required|unique:comics,thumb|url',
            'price' => 'required|numeric|between:0.99,999.99',
            'series' => 'required',
            'sale_date' => 'required|date',
            'type' => 'required'
        ]);
        $form_data = $request->all();
        $newComic = new Comic();
        $newComic->fill($form_data);
        $newComic->save();
        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {

        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => ['required|min:5|max:255', Rule::unique('comics', 'title')->ignore($comic->id),],
            'description' => ['required', Rule::unique('comics', 'description')->ignore($comic->id),],
            'thumb' => ['required|url', Rule::unique('comics', 'thumb')->ignore($comic->id),],
            'price' => 'required|numeric|between:0.99,999.99',
            'series' => 'required',
            'sale_date' => 'required|date',
            'type' => 'required'
        ]);
        $form_data = $request->all();
        $comic->update($form_data);
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('message', "{$comic->title} has been deleted");
    }
}
