<?php

namespace App\Http\Controllers;

use App\Models\Addresume;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AddresumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Addresumes/index', [
            'addresumes' => Addresume::with('user:id,name')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

            $validated = $request->validate([
                'add_job_title' => 'required|string|max:255',
                'add_job_description' => 'required',

            ]);

            $request->user()->addresumes()->create($validated);

        return redirect(route('addresumes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Addresume $addresume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Addresume $addresume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Addresume $addresume): RedirectResponse
    {
        $this->authorize('update', $addresume);

        $validated = $request->validate([
            'add_job_title' => 'required|string|max:255',
            'add_job_description' => 'required',
        ]);

        $addresume->update($validated);

        return redirect(route('addresumes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Addresume $addresume): RedirectResponse
    {
        $this->authorize('delete', $addresume);

        $addresume->delete();

        return redirect(route('addresumes.index'));
    }
}
