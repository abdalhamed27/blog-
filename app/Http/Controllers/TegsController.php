<?php

namespace App\Http\Controllers;

use App\teg;
use Illuminate\Http\Request;

class TegsController extends Controller
{
    public function show($id)
    {
    $teg=teg::find($id);
    // variable go to view name with name ==Teg
    return view('tegs.show')->withTeg($teg);
    }


}
