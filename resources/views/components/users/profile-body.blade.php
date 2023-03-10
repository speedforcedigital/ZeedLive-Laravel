<?php //echo "<pre>";print_r($userProfile);die(); ?>
<div 
    class="grow flex flex-col md:translate-x-0 duration-300 ease-in-out"
    :class="profileSidebarOpen ? 'translate-x-1/3' : 'translate-x-0'"
>

    <!-- Profile background -->
    <div class="relative h-56 bg-slate-200">
        <img class="object-cover h-full w-full" src="{{ asset('images/profile-bg.jpg') }}" width="979" height="220" alt="Profile background" />
        <!-- Close button -->
        <button
            class="md:hidden absolute top-4 left-4 sm:left-6 text-white opacity-80 hover:opacity-100"
            @click.stop="profileSidebarOpen = !profileSidebarOpen"
            aria-controls="profile-sidebar"
            :aria-expanded="profileSidebarOpen"
        >
            <span class="sr-only">Close sidebar</span>
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
            </svg>
        </button>        
    </div>

    <!-- Content -->
    <div class="relative px-4 sm:px-6 pb-8">

        <!-- Pre-header -->
        <div class="-mt-16 mb-6 sm:mb-3">

            <div class="flex flex-col items-center sm:flex-row sm:justify-between sm:items-end">

                <!-- Avatar -->
                <div class="inline-flex -ml-1 -mt-1 mb-4 sm:mb-0">
                    <img class="rounded-full border-4 border-white" src="https://api.staging.zeedlive.com/image/user_profile/{{$userProfile['accountDetail']['profile_image']}}" width="128" height="128" alt="Avatar" />
                </div>
    
                <!-- Actions -->
                <div class="flex space-x-2 sm:mb-2">
                    <button class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">
                    {{$userProfile['AuctualRate']}}<span class="ml-2">Rating</span>
                    </button>
                    <button class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">
                        0<span class="ml-2">Orders</span>
                    </button>
                    <button class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">
                        {{$userProfile['collection']}}<span class="ml-2">Collections</span>
                    </button>
                    <button class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">
                        {{$userProfile['follower']}}<span class="ml-2">Followers</span>
                    </button>
                    <button class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white">
                        {{$userProfile['following']}}<span class="ml-2">Following</span>
                    </button>
                </div>

            </div>

        </div>

        <!-- Header -->
        <header class="text-center sm:text-left mb-6">
            <!-- Name -->
            <div class="inline-flex items-start mb-2">
                <h1 class="text-2xl text-slate-800 font-bold">{{$userProfile['name']}}</h1>
                <svg class="w-4 h-4 fill-current shrink-0 text-amber-500 ml-2" viewBox="0 0 16 16">
                    <path d="M13 6a.75.75 0 0 1-.75-.75 1.5 1.5 0 0 0-1.5-1.5.75.75 0 1 1 0-1.5 1.5 1.5 0 0 0 1.5-1.5.75.75 0 1 1 1.5 0 1.5 1.5 0 0 0 1.5 1.5.75.75 0 1 1 0 1.5 1.5 1.5 0 0 0-1.5 1.5A.75.75 0 0 1 13 6ZM6 16a1 1 0 0 1-1-1 4 4 0 0 0-4-4 1 1 0 0 1 0-2 4 4 0 0 0 4-4 1 1 0 1 1 2 0 4 4 0 0 0 4 4 1 1 0 0 1 0 2 4 4 0 0 0-4 4 1 1 0 0 1-1 1Z" />
                </svg>
            </div>
            
        </header>

       

        <!-- Profile content -->
        <div class="flex flex-col xl:flex-row xl:space-x-16">

            <!-- Main content -->
            <div class="space-y-5 mb-8 xl:mb-0">
    
                <!-- About Me -->
                <div>
                    <h2 class="text-slate-800 font-semibold mb-2">About Me</h2>
                    <div class="text-sm space-y-2">
                        <p>{{$userProfile['accountDetail']['description']}}</p>
                        
                    </div>
                </div>
    
                <!-- Departments -->
                <div>
                    <h2 class="text-slate-800 font-semibold mb-2">Departments</h2>
                    <!-- Cards -->
                    <div class="grid xl:grid-cols-2 gap-4">

                        <!-- Card -->
                        <div class="bg-white p-4 border border-slate-200 rounded-sm shadow-sm">
                            <!-- Card header -->
                            <div class="grow flex items-center truncate mb-2">
                                <div class="w-8 h-8 shrink-0 flex items-center justify-center bg-slate-700 rounded-full mr-2">
                                    <img class="ml-1" src="{{ asset('images/icon-03.svg') }}" width="14" height="14" alt="Icon 03" />
                                </div>
                                <div class="truncate">
                                    <span class="text-sm font-medium text-slate-800">Acme Marketing</span>
                                </div>
                            </div>
                            <!-- Card content -->
                            <div class="text-sm mb-3">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</div>
                            <!-- Card footer -->
                            <div class="flex justify-between items-center">
                                <!-- Avatars group -->
                                <div class="flex -space-x-3 -ml-0.5">
                                    <img class="rounded-full border-2 border-white box-content" src="{{ asset('images/avatar-02.jpg') }}" width="24" height="24" alt="Avatar" />
                                    <img class="rounded-full border-2 border-white box-content" src="{{ asset('images/avatar-03.jpg') }}" width="24" height="24" alt="Avatar" />
                                    <img class="rounded-full border-2 border-white box-content" src="{{ asset('images/avatar-04.jpg') }}" width="24" height="24" alt="Avatar" />
                                    <img class="rounded-full border-2 border-white box-content" src="{{ asset('images/avatar-05.jpg') }}" width="24" height="24" alt="Avatar" />
                                </div>
                                <!-- Link -->
                                <div>
                                    <a class="text-sm font-medium text-indigo-500 hover:text-indigo-600" href="#0">View -&gt;</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="bg-white p-4 border border-slate-200 rounded-sm shadow-sm">
                            <!-- Card header -->
                            <div class="grow flex items-center truncate mb-2">
                                <div class="w-8 h-8 shrink-0 flex items-center justify-center bg-slate-700 rounded-full mr-2">
                                    <img class="ml-1" src="{{ asset('images/icon-02.svg') }}" width="14" height="14" alt="Icon 02" />
                                </div>
                                <div class="truncate">
                                    <span class="text-sm font-medium text-slate-800">Acme Product</span>
                                </div>
                            </div>
                            <!-- Card content -->
                            <div class="text-sm mb-3">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</div>
                            <!-- Card footer -->
                            <div class="flex justify-between items-center">
                                <!-- Avatars group -->
                                <div class="flex -space-x-3 -ml-0.5">
                                    <img class="rounded-full border-2 border-white box-content" src="{{ asset('images/avatar-06.jpg') }}" width="24" height="24" alt="Avatar" />
                                    <img class="rounded-full border-2 border-white box-content" src="{{ asset('images/avatar-03.jpg') }}" width="24" height="24" alt="Avatar" />
                                    <img class="rounded-full border-2 border-white box-content" src="{{ asset('images/avatar-01.jpg') }}" width="24" height="24" alt="Avatar" />
                                </div>
                                <!-- Link -->
                                <div>
                                    <a class="text-sm font-medium text-indigo-500 hover:text-indigo-600" href="#0">View -&gt;</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
    
                
    
            </div>

            <!-- Sidebar -->
            <aside class="xl:min-w-56 xl:w-56 space-y-3">
                <div class="text-sm">
                    <h3 class="font-medium text-slate-800">Mobile</h3>
                    <div>{{$userProfile['mobile']}}</div>
                </div>
                <div class="text-sm">
                    <h3 class="font-medium text-slate-800">Gender</h3>
                    <div>{{$userProfile['gender']}}</div>
                </div>
                <div class="text-sm">
                    <h3 class="font-medium text-slate-800">Email</h3>
                    <div>{{$userProfile['email']}}</div>
                </div>
                <div class="text-sm">
                    <h3 class="font-medium text-slate-800">Rank</h3>
                    <div>{{$userProfile['rank']}}</div>
                </div>
            </aside>

        </div>

    </div>

</div>