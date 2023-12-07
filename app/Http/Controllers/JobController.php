<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Support\Facades\App;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter_cat = Job::select('category')
            ->distinct()
            ->pluck('category');
        $filter_com = Company::select('users.name')
            ->distinct()
            ->join('jobs', 'jobs.company_id', '=', 'companies.id')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->get()
            ->pluck('name');
        $message = "none";
        $jobs = Job::orderBy('created_at', 'desc')->paginate(12);
        return view('dashboard', with(["jobs" => $jobs, "message" => $message, "word" => "", "filter_cat" => $filter_cat, "filter_com" => $filter_com]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filter_cat = Job::select('category')
            ->distinct()
            ->pluck('category');
        $filter_com = Company::select('users.name')
            ->distinct()
            ->join('jobs', 'jobs.company_id', '=', 'companies.id')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->get()
            ->pluck('name');
        return view('job-form', [
            'status' => 'create',
            'word' => "",
            'filter_cat' => $filter_cat,
            'filter_com' => $filter_com
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'requirements' => ['required', 'string'],
            'salary' => ['required', 'string', 'max:255'],
            'job_pict' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'applicants_quota' => ['required', 'string'],
        ]);


        $user = Job::create([
            'name' => $request->name,
            'position' => $request->position,
            'category' => $request->category,
            'type' => $request->type,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'salary' => intval($request->salary),
            'job_pict' => $request->file('job_pict')->store("job_pict"),
            'applicants_quota' => intval($request->applicants_quota),
            'applicants_count' => 0,
            'isActive' => 1,
            'company_id' => $request->user()->id,
        ]);


        return redirect()->to("/job-offered/{$request->user()->id}");
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
        $filter_cat = Job::select('category')
            ->distinct()
            ->pluck('category');
        $filter_com = Company::select('users.name')
            ->distinct()
            ->join('jobs', 'jobs.company_id', '=', 'companies.id')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->get()
            ->pluck('name');

        if (\Illuminate\Support\Facades\Auth::check()) {
            $details = Job::where('id', $id)
                ->get();
            $related = $this->getRelated($id);
            return view('job-details', with(['details' => $details, 'related' => $related, "word" => "", "filter_cat" => $filter_cat, "filter_com" => $filter_com]));
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

    public function search()
    {

        $filter_cat = Job::select('category')
            ->distinct()
            ->pluck('category');
        $filter_com = Company::select('users.name')
            ->distinct()
            ->join('jobs', 'jobs.company_id', '=', 'companies.id')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->get()
            ->pluck('name');
        $word = request("search");

        $f_com = request("filter_com");

        $f_cat = request("filter_cat");

        $jobs = Job::when($word, function ($query) use ($word) {
            $query->where(function ($subquery) use ($word) {
                $subquery->where('jobs.name', 'like', "%$word%")
                    ->orWhere('jobs.description', 'like', "%$word%");
            });
        })
            ->join('companies', 'jobs.company_id', '=', 'companies.id')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->when($f_com, function ($query) use ($f_com) {
                $query->where('users.name', 'like', "%$f_com%");
            })
            ->when($f_cat, function ($query) use ($f_cat) {
                $query->where('jobs.category', 'like', "%$f_cat%");
            })
            ->select('jobs.*') // Pilih kolom-kolom dari tabel jobs yang ingin Anda ambil
            ->orderBy('jobs.created_at', 'desc')
            ->paginate(12);


        if ($jobs->count() == 0) {
            $message = "Keyword \"$word\" not found";
        } else {
            $message = "Showing result of \"$word\"";
        }

        return view('dashboard', with(["jobs" => $jobs, "message" => $message, "word" => $word, "filter_cat" => $filter_cat, "filter_com" => $filter_com]));
    }

    public function getOffered($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $filter_cat = Job::select('category')
            ->distinct()
            ->pluck('category');
        $filter_com = Company::select('users.name')
            ->distinct()
            ->join('jobs', 'jobs.company_id', '=', 'companies.id')
            ->join('users', 'companies.user_id', '=', 'users.id')
            ->get()
            ->pluck('name');
        $jobs = Job::where('company_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('job-list', with(["jobs" => $jobs, "word" => "", "filter_cat" => $filter_cat, "filter_com" => $filter_com]));
    }
}
