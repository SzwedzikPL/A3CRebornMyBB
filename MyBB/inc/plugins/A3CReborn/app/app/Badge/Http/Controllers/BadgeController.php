<?php

namespace App\Badge\Http\Controllers;

use App\Badge\Http\Resources\BadgeCollection;
use App\Badge\Model\Badge;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    /**
     * BadgeController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Badge::class, 'badge');
    }

    /**
     * Display a listing of the resource.
     *
     * @return BadgeCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        return new BadgeCollection(Badge::all());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Badge\Model\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function show(Badge $badge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Badge\Model\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function edit(Badge $badge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Badge\Model\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Badge $badge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Badge\Model\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Badge $badge)
    {
        //
    }
}
