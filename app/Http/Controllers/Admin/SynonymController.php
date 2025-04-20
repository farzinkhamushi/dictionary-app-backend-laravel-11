<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Synonym;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Synonym $synonym)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Synonym $synonym)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Synonym $synonym)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Synonym $synonym)
    {
        //
    }
}
