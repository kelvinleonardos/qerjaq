@extends("layouts.app")

@section("content")

    @include("components.navbar")

        <div class="justify-center md:flex flex-row">
            <div class="p-2 mx-2 md:p-4 md:pr-0 md:mr-2 md:w-2/3">

                <div class="p-2 rounded-lg mt-14 bg-white shadow dark:bg-gray-800">

                    @include('components.back-to-dashboard')

                    <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                        <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">Create Job</h2>
                        <p class="text-s tracking-tight text-gray-900 dark:text-white">Enter job details</p>
                    </div>

                    <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <form method="POST" action="/create-job/{{ \Illuminate\Support\Facades\Auth::user()->company->id }}" enctype="multipart/form-data">
                            @csrf
                            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                <li class="me-2">
                                    <button id="about-tab" type="button" class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Job Details</button>
                                </li>
                                <li class="ml-2 m-auto">
                                    <button id="statistics-tab" type="submit" role="tab"  class="relative inline-flex items-center justify-center p-0.5 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-800 rounded-md group-hover:bg-opacity-0">
                                            CREATE JOB
                                        </span>
                                    </button>
                                </li>
                            </ul>
                            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">

                                <!-- Name -->
                                <div class="mt-4">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Position -->
                                <div class="mt-4">
                                    <x-input-label for="position" :value="__('Position')" />
                                    <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" required autocomplete="position" />
                                    <x-input-error :messages="$errors->get('position')" class="mt-2" />
                                </div>

                                <!-- Category -->
                                <div class="mt-4">
                                    <x-input-label for="category" :value="__('Category')" />

                                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Choose a category</option>
                                        <option value="education">Education</option>
                                        <option value="law">Law</option>
                                        <option value="government">Government</option>
                                        <option value="health">Health</option>
                                        <option value="service">Service</option>
                                        <option value="transportation">Transportation</option>
                                        <option value="art">Art</option>
                                        <option value="communication">Communication</option>
                                        <option value="construction">Construction</option>
                                        <option value="manufacture">Manufacture</option>
                                        <option value="finance">Finance</option>
                                        <option value="technology">Technology</option>
                                    </select>

                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>

                                <!-- Type -->
                                <div class="mt-4">
                                    <x-input-label for="type" :value="__('Type')" />
                                    <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Choose a type</option>
                                        <option value="fulltime">Full Time</option>
                                        <option value="parttime">Part Time</option>
                                        <option value="freelance">Freelance</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="address" :value="__('Address')" />
                                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="city" :value="__('City')" />
                                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autocomplete="city" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="country" :value="__('Country')" />
                                    <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autocomplete="country" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>


                                <!-- Description -->
                                <div class="mt-4">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <!-- Requirements -->
                                <div class="mt-4">
                                    <x-input-label for="requirements" :value="__('Requirements')" />
                                    <x-text-input id="requirements" class="block mt-1 w-full" type="text" name="requirements" :value="old('requirements')" required autofocus autocomplete="requirements" />
                                    <x-input-error :messages="$errors->get('requirements')" class="mt-2" />
                                </div>

                                <!-- Salary -->
                                <div class="mt-4">
                                    <x-input-label for="salary" :value="__('Salary')" />
                                    <x-text-input id="salary" class="block mt-1 w-full" type="text" name="salary" :value="old('salary')" required autofocus autocomplete="salary" />
                                    <x-input-error :messages="$errors->get('salary')" class="mt-2" />
                                </div>

                                <!-- Job Pict -->
                                <div class="mt-4">
                                    <div class="max-w-lg">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="job_pict">Upload image</label>
                                        <input name="job_pict" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="job_pict" type="file">
                                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Please upload your profile picture</div>
                                    </div>
                                </div>

                                <!-- Applicants Quota -->
                                <div class="mt-4">
                                    <x-input-label for="applicants_quota" :value="__('Applicants Quota')" />
                                    <x-text-input id="applicants_quota" class="block mt-1 w-full" type="text" name="applicants_quota" :value="old('applicants_quota')" required autofocus autocomplete="applicants_quota" />
                                    <x-input-error :messages="$errors->get('applicants_quota')" class="mt-2" />
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="p-2 mx-2 md:flex-row md:p-4 md:pl-0 md:ml-2 md:w-1/4">
                <div class="flex flex-wrap p-2 rounded-lg mt-0 md:mt-14 bg-white shadow dark:bg-gray-800">

                    <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col sm:flex-row md:flex-col items-center py-10">
                            <img class="w-24 h-24 mb-3 ml-4 md:ml-0 rounded-full shadow-lg" src="{{ asset('storage/') }}/{{ Auth::user()->profile_pict }}" alt="Company"/>
                            <div class="flex flex-col pl-0 sm:pl-4 items-center sm:items-start md:pl-0 md:items-center">
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h5>
                                <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                                <div class="flex mt-4 md:mt-6">
                                    <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add friend</a>
                                    <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Message</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection
