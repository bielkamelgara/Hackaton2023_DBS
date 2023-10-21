<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

/**
 * Class MembershipController
 * @package App\Http\Controllers
 */
class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::paginate();

        return view('membership.index', compact('memberships'))
            ->with('i', (request()->input('page', 1) - 1) * $memberships->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $membership = new Membership();
        return view('membership.create', compact('membership'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Membership::$rules);

        $membership = Membership::create($request->all());

        return redirect()->route('memberships.index')
            ->with('success', 'Membership created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membership = Membership::find($id);

        return view('membership.show', compact('membership'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membership = Membership::find($id);

        return view('membership.edit', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Membership $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        request()->validate(Membership::$rules);

        $membership->update($request->all());

        return redirect()->route('memberships.index')
            ->with('success', 'Membership updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $membership = Membership::find($id)->delete();

        return redirect()->route('memberships.index')
            ->with('success', 'Membership deleted successfully');
    }
}
