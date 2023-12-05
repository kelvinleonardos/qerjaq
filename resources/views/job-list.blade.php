@extends("layouts.app")

@section("content")

    @include("components.navbar")

    @include("components.sidebar")

    <div class="p-4 sm:ml-64">
        <div class="mb-3 mt-14 text-center">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                    </tr>
                    </thead>
                    @foreach($jobs as $j)
                        <tbody>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $j->name }}
                            </th>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>

        </div>
    </div>

@endsection
