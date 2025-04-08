<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Supportify - Agent Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0F172A] text-white font-sans">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#1E293B] p-6 space-y-6 hidden md:block">
      <h1 class="text-2xl font-bold text-orange-400">Supportify</h1>
      <nav class="space-y-3">
        <a href="#" class="flex items-center space-x-2 text-orange-400 font-medium">
          <span>🏠</span>
          <span>Dashboard</span>
        </a>
        <a href="#" class="block hover:text-orange-300">Tickets</a>
        <a href="#" class="block hover:text-orange-300">Messages</a>
        <a href="#" class="block hover:text-orange-300">Analytics</a>
        <a href="#" class="block hover:text-orange-300">Settings</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4 md:p-8">
      <!-- Topbar -->
      <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <input type="text" placeholder="Search tickets..." class="w-full md:w-1/3 p-2 rounded bg-[#1E293B] border border-[#334155] focus:outline-none" />
        <div class="flex items-center space-x-4">
          <img src="/photo.jpeg" alt="avatar" class="rounded-full w-8 h-8" />
        </div>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
        <div class="bg-[#1E293B] p-4 rounded-lg">
          <p class="text-sm text-gray-400">Open Tickets</p>
          <h2 class="text-xl font-semibold">248</h2>
          <p class="text-green-400 text-xs">+12% vs last week</p>
        </div>
        <div class="bg-[#1E293B] p-4 rounded-lg">
          <p class="text-sm text-gray-400">Resolved</p>
          <h2 class="text-xl font-semibold">1,842</h2>
          <p class="text-green-400 text-xs">+8% vs last week</p>
        </div>
        <div class="bg-[#1E293B] p-4 rounded-lg">
          <p class="text-sm text-gray-400">Response Time</p>
          <h2 class="text-xl font-semibold">1.8h</h2>
          <p class="text-red-400 text-xs">-5% vs last week</p>
        </div>
        <div class="bg-[#1E293B] p-4 rounded-lg">
          <p class="text-sm text-gray-400">Customer Satisfaction</p>
          <h2 class="text-xl font-semibold">94%</h2>
          <p class="text-green-400 text-xs">+2% vs last week</p>
        </div>
      </div>

      <!-- Recent Tickets -->
      <div class="mt-8">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-semibold">Recent Tickets</h3>
          <button class="text-sm bg-orange-400 text-white px-4 py-1 rounded hover:bg-orange-500">View All</button>
        </div>
        <div class="space-y-4">
          <div class="bg-[#1E293B] p-4 rounded-lg flex justify-between items-center">
            <div>
              <p class="font-semibold">Login Authentication Issue</p>
              <p class="text-sm text-gray-400">Sarah Wilson • 2 hours ago</p>
            </div>
            <span class="text-sm bg-yellow-500 text-black px-3 py-1 rounded-full">In Progress</span>
          </div>
          <div class="bg-[#1E293B] p-4 rounded-lg flex justify-between items-center">
            <div>
              <p class="font-semibold">Database Connection Error</p>
              <p class="text-sm text-gray-400">Mike Thompson • 3 hours ago</p>
            </div>
            <span class="text-sm bg-red-600 text-white px-3 py-1 rounded-full">High Priority</span>
          </div>
          <div class="bg-[#1E293B] p-4 rounded-lg flex justify-between items-center">
            <div>
              <p class="font-semibold">Feature Request: Dark Mode</p>
              <p class="text-sm text-gray-400">Emily Chen • 5 hours ago</p>
            </div>
            <span class="text-sm bg-green-500 text-black px-3 py-1 rounded-full">New</span>
          </div>
        </div>
      </div>

      <!-- Charts placeholders -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
        <div class="bg-[#1E293B] rounded-lg p-6 h-48">
          <h4 class="text-lg font-semibold mb-2">Resolution Time</h4>
          <div class="h-full bg-[#0F172A] rounded"></div>
        </div>
        <div class="bg-[#1E293B] rounded-lg p-6 h-48">
          <h4 class="text-lg font-semibold mb-2">Ticket Categories</h4>
          <div class="h-full bg-[#0F172A] rounded"></div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
