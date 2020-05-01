<?php

namespace App\Badge\Http\Controllers;

use App\Badge\Http\Requests\BadgeGroupRequest;
use App\Badge\Http\Resources\BadgeGroupCollection;
use App\Badge\Model\BadgeGroup;
use App\Badge\Http\Resources\BadgeGroup as BadgeGroupResource;
use App\Core\Http\Controllers\Controller;

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
     * @return BadgeGroupCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        return new BadgeGroupCollection(BadgeGroup::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BadgeGroupRequest $request
     * @return BadgeGroupResource|void
     */
    public function store(BadgeGroupRequest $request)
    {
        $badgeGroup = BadgeGroup::create($request->validated());
        return new BadgeGroupResource($badgeGroup);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Badge\Model\BadgeGroup  $badgeGroup
     * @return BadgeGroupResource|\Illuminate\Http\Response
     */
    public function show(BadgeGroup $badgeGroup)
    {
        return new BadgeGroupResource($badgeGroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BadgeGroupRequest $request
     * @param \App\Badge\Model\BadgeGroup $badgeGroup
     * @return BadgeGroupResource|void
     */
    public function update(BadgeGroupRequest $request, BadgeGroup $badgeGroup)
    {
        $badgeGroup->fill($request->validated())->save();
        return new BadgeGroupResource($badgeGroup);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Badge\Model\BadgeGroup $badgeGroup
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|void
     * @throws \Exception
     */
    public function destroy(BadgeGroup $badgeGroup)
    {
        $badgeGroup->delete();
        return response('Deleted', 202);
    }
}
