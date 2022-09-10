<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index(){
        $grades=Grade::all();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        return view('grades/create');  
    }

    public function store(Request $request)
    {
        $request->validate([
            'grade' => 'required',
            'amount' => 'required',
        ]);

        Grade::create($request->all());

        return redirect()->route('garde.index')->with('success','Berhasil Menambahkan.');
    }
}