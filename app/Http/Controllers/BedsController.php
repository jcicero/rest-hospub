<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bed;

class BedsController extends Controller
{

  public function index()
  {
    $beds = Bed::all();
    return $beds;
  }

}