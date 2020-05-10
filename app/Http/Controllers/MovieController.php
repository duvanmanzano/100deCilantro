<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Schedule;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MovieController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $movies = Movie::select('movies.*', DB::Raw('TRUNCATE(AVG(appreciation.value),1) as appreciation'), DB::Raw(' (0) as show_vue'))
            ->from('movies')
            ->join('appreciation','appreciation.id_movie','=','movies.id_movies')
            ->groupBy(DB::Raw('movies.id_movies,movies.name,movies.picture,movies.max_num,movies.price'))
            ->get();

            return $movies;
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display a information the movie
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataMovie($id_movie)
    {
        try{

            $Schedule = Schedule::select(DB::Raw('schedule.*, COUNT(tickets.id_schedule) as sold, (movies.max_num- COUNT(tickets.id_schedule) ) as available'))
            ->from('schedule')
            ->leftjoin('tickets','schedule.id_schedule','=','tickets.id_schedule')
            ->leftjoin('movies','schedule.id_movies','=','movies.id_movies')
            ->where('schedule.id_movies',$id_movie)
            ->groupBy(DB::Raw('schedule.id_schedule'))
            ->get();

            return $Schedule;
        }catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Movie::create($request->all())){
            return response()->json(['message' => 'Successfully']);
        }else{
            return response()->json(['message' => 'Erroro']);
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
        //
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
        //
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
}
