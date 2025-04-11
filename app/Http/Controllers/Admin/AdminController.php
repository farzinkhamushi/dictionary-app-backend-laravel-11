<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Definition;
use App\Models\Word;

class AdminController extends Controller
{
    //
    public function index()
    {
        $definitions = Definition::all();
        $words = Word::all();
        $synonyms = Synonym::all();
        $plans = Plan::all();
        $subscriptions = Subscription::all();

        return view('admin.dashboard')->with([
            'definitions' => $definitions ,
            'words' => $words , 
            'synonyms' => $synonyms ,
            'plans' => $plans ,
            'subscriptions' => $subscriptions
        ]);
    }
}
