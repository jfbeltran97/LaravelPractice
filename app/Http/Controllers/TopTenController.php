<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopTenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topTen = DB::table('movie_logs')
                    ->select('movie', DB::raw('count(movie) as count'))
                    ->groupBy('movie')
                    ->orderBy('count', 'desc')
                    ->take(10)
                    ->get();
        return view('topten.show', array('topTen' => $topTen));
    }
}
