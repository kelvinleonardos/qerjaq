<div class="flex items-center">
    <div class="flex items-center ms-3">
        <div>
            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ asset('storage/') }}/{{ Auth::user()->profile_pict }}" alt="user photo">
            </button>
        </div>
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
            <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                    {{ \Illuminate\Support\Facades\Auth::user()->email }}
                </p>
            </div>
            <ul class="py-1" role="none">
                <li>
                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profile</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->role == "1")
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Job Applied</a>
                    </li>
                @elseif(\Illuminate\Support\Facades\Auth::user()->role == "2")
                    <li>
                        <a href="/job-offered/{{ \Illuminate\Support\Facades\Auth::user()->company->id }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Job Offered</a>
                    </li>
                @endif
                <li>
                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" href="#" role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
