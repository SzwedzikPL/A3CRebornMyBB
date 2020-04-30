<?php

namespace App\Badge\Http\Controllers;

use App\Badge\Model\BadgeGroup;
use Illuminate\Http\Request;

class BadgeGroupController extends Controller
{
    /**
     * BadgeController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(BadgeGroup::class, 'badge_group');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Badge\Model\BadgeGroup  $badgeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(BadgeGroup $badgeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Badge\Model\BadgeGroup  $badgeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(BadgeGroup $badgeGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Badge\Model\BadgeGroup  $badgeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BadgeGroup $badgeGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Badge\Model\BadgeGroup  $badgeGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(BadgeGroup $badgeGroup)
    {
        //
    }
}
