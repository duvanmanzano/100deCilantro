<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReserveController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bookings = DB::table('tickets')
            ->join('movies', 'tickets.id_movie', '=', 'movies.id_movies')
            ->join('schedule', 'tickets.id_schedule', '=', 'schedule.id_schedule')
            ->select('movies.*', 'schedule.schedule', DB::Raw(' (0) as show_vue'))
            ->where('tickets.id_user', $request->user)
            ->orderBy('tickets.created_at', 'desc')
            ->get();
        return $bookings;
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
        try{
            $booking = new Ticket();
            $booking->fill($request->all());
            $booking->created_at = Carbon::now();
            $booking->updated_at = Carbon::now();
            $booking->save();
            return response()->json(['message' => 'Successfully']); 
        }catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
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
