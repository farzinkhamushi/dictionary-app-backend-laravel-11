<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Synonym;
use Illuminate\Http\Request;
use App\Http\Requests\AddSynonymRequest;
use App\Http\Requests\UpdateSynonymRequest;
use App\Models\Word;

class SynonymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $synonyms = Sysnonym::all();
        return view('admin.synonyms.index')->with([
            'synonyms' => $synonyms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $words = Word::all();
        return view('admin.synonyms.create')->with([
            'words' => $words
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSynonymRequest $request)
    {
        if($request->validated()){
            Synonym::create($request->validated());
            return redirect()->route('admin.synonyms.index')->with([
                'success' => 'Synonym added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Synonym $synonym)
    {
        //
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Synonym $synonym)
    {
        $words = Word::all();
        return view('admin.synonyms.edit')->with([
            'synonym' => $synonym ,
            'words' => $words
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSynonymRequest $request, Synonym $synonym)
    {
        if($request->validated()){
            $synonym->update($request->validated());
            return redirect()->route('admin.synonyms.index')->with([
                'success' => 'sysnomym Updated successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Synonym $synonym)
    {
        //
    }
}
