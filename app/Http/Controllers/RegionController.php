<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;

class RegionController extends Controller
{
    /**
     * Display a listing of regions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mediante ajax recogeré todo el contenido de la tabla regions
        $regions = Region::all();
        return $regions;
    }
}
