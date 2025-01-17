<?php

namespace App\Http\Controllers;

use App\Models\basics_learning;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;


class BasicsLearningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
            return view('basics_learning.index', [
                'basics_learning' => basics_learning::with('user')->latest()->get(),
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
            'message' => 'required|string|max:255',
        ]);
 
        $request->user()->basics_learning()->create($validated);
 
        return redirect(route('basics_learning.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(basics_learning $basics_learning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    public function edit(basics_learning $basics_learning): View
    {dd($basics_learning);
        Gate::authorize('update', $basics_learning);
 
        return view('basics_learning.edit', [
            'basics_learning' => $basics_learning,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, basics_learning $basics_learning): RedirectResponse
    {
        Gate::authorize('update', $basics_learning);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $basics_learning->update($validated);
 
        return redirect(route('basics_learning.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(basics_learning $basics_learning): RedirectResponse
    {
        Gate::authorize('delete', $basics_learning);
 
        $basics_learning->delete();
 
        return redirect(route('basics_learning.index'));
    }
}
