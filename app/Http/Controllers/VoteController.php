<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vote;

class VoteController extends Controller
{
    public function index(){
        $votes = Vote::all();
        return view('home', compact('votes'));
    }

    public function store(){
        $this->validate(request(), [
            'option' => 'required'
        ]);

        $vote = Vote::create([
            'option' => request('option'),
            'points' => '1'
        ]);

        return redirect('/');
    }
}
