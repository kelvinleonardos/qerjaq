<div class="w-full m-2 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div>
        <img class="mb-4 rounded-t-lg mx-auto" src="{{ asset("/storage") }}/{{ $job->job_pict }}"style="width: 400px; height: 200px" alt="product image" />
    </div>
    <div class="px-5 pb-5">
        <div class="flex justify-between mt-2.5 mb-5">
            <div class="space-x-1 rtl:space-x-reverse">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $job->name }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $job->position }}</p>
            </div>
            <span class="h-5 bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{ $job->type }}</span>
        </div>
        <div class="flex items-center justify-between">
            <div>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-s font-bold">
                    {{ $job->company->user->name }}
                </p>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-xs">
                    {{ $job->city }}, {{ $job->country }}
                </p>
            </div>
            <a href="/job-details/{{ $job->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">See details</a>
        </div>
    </div>
</div>
