<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(12);
        return view('dashboard', compact("jobs"));
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
    public function store(StoreJobRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }

    public function getDetails(String $id)
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            $details = Job::where('id', $id)
                ->get();
            $related = $this->getRelated($id);
            return view('job-details', with(['details' => $details, 'related' => $related]));
        } else {
            return view('auth.login');
        }

    }

    public function getRelated(string $jobId)
    {
        $company_id = Job::where('id', $jobId)->value('company_id');

        // Mengembalikan 5 entry terbaru dengan company_id yang sama
        return Job::where('company_id', $company_id)
            ->orderByRaw('(applicants_quota - applicants_count) ASC')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }
}
