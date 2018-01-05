<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Branch;

class CountryController extends Controller
{
    public function showForm()
    {
        $branches = Branch::all();

        return view('form', compact('branches'));
    }
}