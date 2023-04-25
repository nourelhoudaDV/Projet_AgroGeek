<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Qualifications\Add as QualificationAdd;
use App\Models\Qualifications as ModelTarget;

class Qualifications extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifications = ModelTarget::with('techniqueA')->get();
        return view('crud.qualification.index', compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.qualification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validated();
        $qualification = ModelTarget::create($validated);
        $this->success(text: trans('messages.added_message'));
        return redirect(Route('qualifications.index'));
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
        $qualification = ModelTarget::findOrFail($id);
        return view('crud.qualification.edit', compact('qualification'));
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
        $qualification = ModelTarget::findOrFail($id);
        $validated = $request->validated();
        $qualification->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(Route('qualifications.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        ModelTarget::findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(Route('qualifications.index'));
    }
    public function destroyGroup(Request $request)
    {
        $ids = $request['ids'] ?? [];
        foreach ($ids as $id) {
            $qualification = ModelTarget::find((int)\Crypt::decrypt($id));
            $qualification?->delete();
        }
        $this->success(text: trans('messages.deleted_message'));
        return response()->json(['success' => true]);
    }
}
