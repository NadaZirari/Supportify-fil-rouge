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
          <img src="https://i.pravatar.cc/30" alt="avatar" class="rounded-full w-8 h-8" />
        </div>
      </div>

     
    </main>
  </div>
</body>
</html>
