<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Tableau de bord</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: {
                            DEFAULT: '#1e1e2d',
                            lighter: '#252547',
                            sidebar: '#252547',
                            card: '#252547'
                        },
                        primary: {
                            DEFAULT: '#ff6b6b',
                        },
                        secondary: {
                            DEFAULT: '#6b77ff',
                        },
                        accent: {
                            DEFAULT: '#ff9f6b',
                            green: '#6bffb8'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-dark text-white">
    <div class="flex h-screen overflow-hidden">
       @include('partials.sidebaragent')
        
        <!-- Main Content -->
        <div class="flex-1 overflow-auto p-6">
            <!-- Search Bar -->
            <div class="relative mb-6 w-[300px]">
                <input type="text" placeholder="Search tickets..." class="w-full pl-10 pr-4 py-2 bg-dark-card border-none rounded-md text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <!-- Open Tickets -->
                <div class="bg-dark-card rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm text-gray-400">Open Tickets</h3>
                        <div class="bg-primary p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">248</h2>
                        <div class="flex items-center text-green-500 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                            <span>10% last week</span>
                        </div>
                    </div>
                </div>
                
                <!-- Resolved -->
                <div class="bg-dark-card rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm text-gray-400">Resolved</h3>
                        <div class="bg-secondary p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">1,842</h2>
                        <div class="flex items-center text-green-500 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                            <span>8% last week</span>
                        </div>
                    </div>
                </div>
                
                <!-- Response Time -->
                <div class="bg-dark-card rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm text-gray-400">Response Time</h3>
                        <div class="bg-accent p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">1.8h</h2>
                        <div class="flex items-center text-red-500 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                            <span>4% last week</span>
                        </div>
                    </div>
                </div>
                
                <!-- Customer Satisfaction -->
                <div class="bg-dark-card rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm text-gray-400">Customer Satisfaction</h3>
                        <div class="bg-accent-green p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">94%</h2>
                        <div class="flex items-center text-green-500 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                            <span>2% last week</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Tickets -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Recent Tickets</h2>
                    <button class="bg-primary hover:bg-[#ff5252] text-white px-4 py-2 rounded-md text-sm">View All</button>
                </div>
                
                <div class="space-y-3">
                    <!-- Ticket 1 -->
                    <div class="bg-dark-card rounded-lg p-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center overflow-hidden">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Wilson" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-medium">Login Authentication Issue</h3>
                                <p class="text-sm text-gray-400">Sarah Wilson • 3 hours ago</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-yellow-600 text-white text-xs rounded-full">In Progress</span>
                    </div>
                    
                    <!-- Ticket 2 -->
                    <div class="bg-dark-card rounded-lg p-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center overflow-hidden">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Mike Thompson" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-medium">Database Connection Error</h3>
                                <p class="text-sm text-gray-400">Mike Thompson • 5 hours ago</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-red-600 text-white text-xs rounded-full">High Priority</span>
                    </div>
                    
                    <!-- Ticket 3 -->
                    <div class="bg-dark-card rounded-lg p-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center overflow-hidden">
                                <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Emily Chen" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-medium">Feature Request: Dark Mode</h3>
                                <p class="text-sm text-gray-400">Emily Chen • 5 hours ago</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-green-600 text-white text-xs rounded-full">New</span>
                    </div>
                </div>
            </div>
            
            <!-- Charts -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Resolution Time Chart -->
                <div class="bg-dark-card rounded-lg p-4">
                    <h2 class="text-xl font-bold mb-4">Resolution Time</h2>
                    <div class="h-[200px] bg-dark flex items-center justify-center text-gray-500">
                        <!-- Chart would go here -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
                
                <!-- Ticket Categories Chart -->
                <div class="bg-dark-card rounded-lg p-4">
                    <h2 class="text-xl font-bold mb-4">Ticket Categories</h2>
                    <div class="h-[200px] bg-dark flex items-center justify-center text-gray-500">
                        <!-- Chart would go here -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>