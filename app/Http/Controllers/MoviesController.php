<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Movie;
use App\Status;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::select(
            'movies.id',
            'movies.name as name',
            'movies.description',
            'users.name as user',
            'statuses.name as status'
        )
            ->join('users', 'movies.user_id', '=' ,'users.id')
            ->join('statuses', 'movies.status_id', '=' ,'statuses.id')
            ->get();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        //variable de sesion
        session(['nombreUsuario' => $user->name]);

        $movie = new Movie;
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->user_id = $user->id;
        $movie->status_id = 1;
        $movie->save();

        return redirect('movies');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //eliminando la var de session
        session()->forget('nombreUsuario');

        $movie= Movie::find($id);
        $statuses = Status::all();
        return view('movies.edit', compact('movie', 'statuses'));


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
        $movie= Movie::find($id);
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->status_id = $request->status;
        $movie->save();

        return redirect('movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showSessionData(){
        return view('movies.sessionData');
    }
}
