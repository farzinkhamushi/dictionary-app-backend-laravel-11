<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Definition;
use App\Models\Word;
use Illuminate\Http\Request;
use App\Http\Requests\AddDefinitionRequest;
use App\Http\Requests\UpdateDefinitionRequest;

class DefinitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $definitions = Definition::all();
        return view('admin.definitions.index')->with([
            'definitions' => $definitions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $words = Word::all();
        return view('admin.definitions.create')->with([
            'words' => $words
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDefinitionRequest $request)
    {
        if($request->validated()){
            $data = $request->validated();
            //$data['slug'] = Str::slug($request->name);
            Definition::create($data);
            return redirect()->route('admin.definitions.index')->with([
                'success' => 'definition added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Definition $definition)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Definition $definition)
    {
        $words = Word::all();
        return view('admin.definitions.edit')->with([
            'definitions' => $definitions ,
            'words' => $words
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDefinitionRequest $request, Definition $definition)
    {
        if($request->validated()){
            $data = $request->validated();
            //$data['slug'] = Str::slug($request->name);
            $definition->update($data);
            return redirect()->route('admin.definitions.index')->with([
                'success' => 'definition updated successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Definition $definition)
    {
        $definition->delete();
        return redirect()->route('admin.definitions.index')->with([
            'success' => 'definition deleted successfully'
        ]);
    }
}
