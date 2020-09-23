<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Movie;
use App\Status;
use mysql_xdevapi\Exception;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
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


            $data = [
                $movies
            ];

            return response()->json($data, 200);

        }catch (Exception $e){
            return response()->error($e->getMessage(), $e->getCode());
        }
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
        try{
            $movie = new Movie;
            $movie->name = $request->name;
            $movie->description = $request->description;
            $movie->user_id = $request->id_user;
            $movie->status_id = 1;
            $movie->save();

            $mensaje = "pelicula guardada";

            $data = [
                $movie,
                $mensaje
            ];

            return response()->json($data, 200);

        }catch (Exception $e){
            return response()->error($e->getMessage(), $e->getCode());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $movies = Movie::select(
                'movies.id',
                'movies.name as name',
                'movies.description',
                'users.name as user',
                'statuses.name as status'
            )
                ->join('users', 'movies.user_id', '=' ,'users.id')
                ->join('statuses', 'movies.status_id', '=' ,'statuses.id')
                ->where('movies.id', $id)
                ->first();

            $data = [
                $movies
            ];

            return response()->json($data, 200);

        }catch (Exception $e){
            return response()->error($e->getMessage(), $e->getCode());
        }
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
        try{
            $movie= Movie::find($id);
            $movie->name = $request->name;
            $movie->description = $request->description;
            $movie->status_id = $request->status;
            $movie->save();

            $mensaje = "pelicula actualizada";

            $data = [
                $movie,
                $mensaje
            ];

            return response()->json($data, 200);
        }catch (Exception $e){
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $movie = Movie::find($id);
            $movie->delete();

            $mensaje = "pelicula eliminada";

            $data = [
                $movie,
                $mensaje
            ];

            return response()->json($data, 200);

        }catch (Exception $e){
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    public function showSessionData(){
        return view('movies.sessionData');
    }
}
