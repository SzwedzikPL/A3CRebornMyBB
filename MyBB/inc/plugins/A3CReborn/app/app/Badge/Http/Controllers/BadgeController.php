<?php

namespace App\Badge\Http\Controllers;

use App\Badge\Http\Requests\BadgeRequest;
use App\Badge\Http\Resources\BadgeCollection;
use App\Badge\Model\Badge;
use App\Badge\Http\Resources\Badge as BadgeResource;
use App\Core\Http\Controllers\Controller;

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
     * Store a newly created resource in storage.
     *
     * @param BadgeRequest $request
     * @return void
     */
    public function store(BadgeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Badge\Model\Badge  $badge
     * @return BadgeResource|\Illuminate\Http\Response
     */
    public function show(Badge $badge)
    {
        return new BadgeResource($badge);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BadgeRequest $request
     * @param \App\Badge\Model\Badge $badge
     * @return void
     */
    public function update(BadgeRequest $request, Badge $badge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Badge\Model\Badge $badge
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|void
     * @throws \Exception
     */
    public function destroy(Badge $badge)
    {
        $badge->delete();
        return response('Deleted', 202);
    }
}
