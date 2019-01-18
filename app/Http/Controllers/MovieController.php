<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use View;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;

class MovieController extends Controller
{
    public static $PLANS = ["basic", "standard", "premium"];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', array('movies' => $movies));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie;
        $movie->title       = Input::get('title');
        $movie->director      = Input::get('director');
        $movie->cast = Input::get('cast');
        $movie->plan = Input::get('plan');
        $movie->rating = Input::get('rating') + 1;
        $movie->save();

        // redirect
        Session::flash('message', 'Successfully created movie!');
        return Redirect::to('movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('movies.show', array('movie' => $movie));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);

        return view('movies.edit', array('movie' => $movie, 'plans' => MovieController::$PLANS));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $movie->title       = Input::get('title');
        $movie->director    = Input::get('director');
        $movie->rating      = Input::get('rating');
        $movie->plan        = Input::get('plan');
        
        $movie->save();

        // redirect
        Session::flash('message', 'Successfully updated movie!');
        return Redirect::to('movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        Session::flash('message', 'Successfully deleted the movie!');
        return Redirect::to('movies');
    }
}
