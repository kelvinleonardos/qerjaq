@extends("layouts.app")

@section("content")

    @include("components.navbar")

    @include("components.sidebar")


    <div class="p-4 sm:ml-64">
        <div class="mb-3 mt-14 text-center">
            @if($message != "none")
                <p class="text-2xl xl text-gray-900 dark:text-white">{{ $message }}</p>
                <div>
                    <nav class="flex pl-4 pt-2" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                    </svg>
                                    Back to dashboard
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            @endif
        </div>
        <div class="flex flex-wrap justify-center p-2 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            @foreach($jobs as $job)
                @include("components.job-card")
            @endforeach
        </div>
        <div class="m-3">
            {{ $jobs->links() }}
        </div>
    </div>
@endsection
