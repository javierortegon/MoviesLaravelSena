<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class PDFController extends Controller
{
    public function PDF(){

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

        $pdf = \PDF::loadView('prueba', ['movies' => $movies]);
        return $pdf->download('pueba.pdf');
    }
}
