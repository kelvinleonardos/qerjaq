@extends("layouts.app")

@section("content")

    @include("components.navbar")

    @include("components.sidebar")


    <div class="p-4 sm:ml-64">
        <div class="flex flex-wrap justify-center p-2 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            @foreach($jobs as $job)
                @include("components.job-card")
            @endforeach
        </div>
        <div class="m-3">
            {{ $jobs->links() }}
        </div>
    </div>
@endsection
