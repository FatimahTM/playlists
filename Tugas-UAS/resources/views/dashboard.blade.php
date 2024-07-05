@extends('layout.main')

@section('title', 'Dashboard')

@section('content')

<div class="container mx-auto py-6 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Dashboard Overview</h2>
            <p class="text-gray-600">"Selamat datang di playlist pribadi Anda yang telah dipersiapkan dengan cermat! 
                Di sini Anda dapat menikmati koleksi lagu-lagu favorit dari berbagai genre, 
                menciptakan suasana yang tepat untuk setiap momen spesial dalam hidup Anda. 
                Jadikan playlist ini sebagai teman setia Anda untuk menemani aktivitas sehari-hari, 
                merayakan kebahagiaan, atau sekadar menikmati kedamaian dalam suasana yang diciptakan 
                oleh melodi-melodi pilihan. Terus tambahkan lagu-lagu baru untuk mengisi perjalanan musikal Anda, 
                dan nikmatilah setiap detiknya dengan penuh semangat!".</p>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Activities</h2>
            <ul class="divide-y divide-gray-200">
                <li class="py-2">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Tom Cook added a new album.</p>
                            <p class="text-sm text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                </li>
                <li class="py-2">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1522071998184-71e0e2e332e0?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Jane Doe uploaded a new song.</p>
                            <p class="text-sm text-gray-500">1 day ago</p>
                        </div>
                    </div>
                </li>
                <!-- Add more recent activities as needed -->
            </ul>
        </div>
    </div>
</div>

@endsection
