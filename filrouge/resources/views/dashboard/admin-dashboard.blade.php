<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sidebar': '#1a2234',
                        'content': '#1e293b',
                        'card': '#252e3f',
                        'blue': '#3b82f6',
                        'purple': '#8b5cf6',
                        'green': '#10b981',
                        'orange': '#f97316',
                        'inprogress': '#f59e0b',
                        'high': '#ef4444',
                        'medium': '#3b82f6',
                        'resolved': '#10b981'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-content text-white flex h-screen">
    <!-- Sidebar -->
@include('partials.sidebaradmin')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <div class="p-6 flex-1 overflow-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-semibold">Dashboard Overview</h1>
                    <p class="text-gray-400">Welcome back, Admin</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <div class="flex items-center">
                        <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center mr-2 overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Admin" class="h-full w-full object-cover">
                        </div>
                        <span>John Admin</span>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Tickets -->
                <div class="bg-card rounded-lg p-6 relative overflow-hidden">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-400 text-sm">Total Tickets</p>
                            <h2 class="text-3xl font-bold mt-1">1,482</h2>
                        </div>
                        <div class="bg-blue bg-opacity-20 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center text-green text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        <span>12% from last month</span>
                    </div>
                </div>

                <!-- Avg. Resolution Time -->
                <div class="bg-card rounded-lg p-6 relative overflow-hidden">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-400 text-sm">Top category</p>
                            <h2 class="text-3xl font-bold mt-1">4.2h</h2>
                        </div>
                        <div class="bg-purple bg-opacity-20 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                        </div>
                    </div>
                    
                </div>

                

                <!-- Open Tickets -->
                <div class="bg-card rounded-lg p-6 relative overflow-hidden">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-400 text-sm">Open Tickets</p>
                            <h2 class="text-3xl font-bold mt-1">246</h2>
                        </div>
                        <div class="bg-orange bg-opacity-20 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center text-gray-400 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                        <span>Same as last month</span>
                    </div>
                </div>
            </div>

            <!-- Top Performing Agents -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Top Performing Agents</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Agent 1 -->
                    <div class="bg-card rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="h-12 w-12 rounded-full bg-purple-500 flex items-center justify-center mr-4 overflow-hidden">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson" class="h-full w-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-semibold">Sarah Johnson</h3>
                                <p class="text-green text-sm">98% satisfaction rate</p>
                            </div>
                        </div>
                    </div>

                    <!-- Agent 2 -->
                    <div class="bg-card rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="h-12 w-12 rounded-full bg-blue-500 flex items-center justify-center mr-4 overflow-hidden">
                                <img src="https://randomuser.me/api/portraits/men/34.jpg" alt="Mike Chen" class="h-full w-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-semibold">Mike Chen</h3>
                                <p class="text-green text-sm">95% satisfaction rate</p>
                            </div>
                        </div>
                    </div>

                    <!-- Agent 3 -->
                    <div class="bg-card rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="h-12 w-12 rounded-full bg-pink-500 flex items-center justify-center mr-4 overflow-hidden">
                                <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Emily Parker" class="h-full w-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-semibold">Emily Parker</h3>
                                <p class="text-green text-sm">93% satisfaction rate</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Tickets -->
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Recent Tickets</h2>
                    <a href="#" class="text-blue hover:underline text-sm">View all</a>
                </div>
                <div class="bg-card rounded-lg overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-400 border-b border-gray-700">
                                <th class="py-3 px-6 font-medium">Ticket</th>
                                <th class="py-3 px-6 font-medium">Status</th>
                                <th class="py-3 px-6 font-medium">Priority</th>
                                <th class="py-3 px-6 font-medium">Agent</th>
                                <th class="py-3 px-6 font-medium">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-700">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="bg-blue-900 p-1 rounded mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </div>
                                        <span>Login page error</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="bg-inprogress text-white text-xs px-2 py-1 rounded-md">In Progress</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="bg-high text-white text-xs px-2 py-1 rounded-md">High</span>
                                </td>
                                <td class="py-4 px-6">Sarah Johnson</td>
                                <td class="py-4 px-6 text-gray-400">2 hours ago</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="bg-green-900 p-1 rounded mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <span>Account setup help</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="bg-resolved text-white text-xs px-2 py-1 rounded-md">Resolved</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="bg-medium text-white text-xs px-2 py-1 rounded-md">Medium</span>
                                </td>
                                <td class="py-4 px-6">Mike Chen</td>
                                <td class="py-4 px-6 text-gray-400">5 hours ago</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>