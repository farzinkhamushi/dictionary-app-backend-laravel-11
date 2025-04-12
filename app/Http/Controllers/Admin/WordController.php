<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Word::all();
        return view('admin.words.index')->with([
            'words' => $words
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.words.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddWordRequest $request)
    {
        if($request->validated()){
            $data = $request->validated();
            $data['slug'] = Str::slug($request->name);
            Word::create($data);
            return redirect()->route('admin.words.index')->with([
                'success' => 'word added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        //
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Word $word)
    {
        return view('admin.words.edit')->with([
            'word' => $word
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWordRequest $request, Word $word)
    {
        if($request->validated()){
            $data = $request->validated();
            $data['slug'] = Str::slug($request->name);
            $word->update($data);
            return redirect()->route('admin.words.index')->with([
                'success' => 'word updated successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        $word->delete();
        return redirect()->route('admin.words.index')->with([
            'success' => 'word deleted successfully'
        ]);
    }
}
