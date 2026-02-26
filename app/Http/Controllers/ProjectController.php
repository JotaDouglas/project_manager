<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('company_id', auth()->user()->company_id)
            ->latest()
            ->get();

        return view('projects.index', compact('projects'));
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Project::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'company_id' => auth()->user()->company_id,
            'user_id' => auth()->id(), // responsável (opcional)
        ]);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $project = $this->findProjectOrFail($id);

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $project = $this->findProjectOrFail($id);

        return view('projects.show', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $project = $this->findProjectOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $project->update($data);

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $project = $this->findProjectOrFail($id);
        $project->delete();

        return redirect()->route('projects.index');
    }

    private function findProjectOrFail(int $id): Project
    {
        return Project::where('company_id', auth()->user()->company_id)
            ->where('id', $id)
            ->firstOrFail();
    }
}
