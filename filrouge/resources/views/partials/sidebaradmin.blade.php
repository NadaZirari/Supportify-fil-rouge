<div class="sidebar-container transition-all duration-300">

<div class="w-[200px] bg-blue-100 flex-shrink-0 flex flex-col">
        
        <nav class="flex-1 py-4 fixed h-screen sidebar-nav bg-blue-100">
        <div class="p-3 ml-8 md:ml-0 font-bold text-xl border-b text-blue-500 flex items-center">
                <i class="fas fa-headset mr-2"></i>
                <span class="sidebar-text">Supportify</span>
            </div>
            <div>
            <a href="{{ route('dashboard.admin-dashboard') }}" class="flex items-center p-3  text-black hover:bg-bleuciel-light  transition-colors duration-200 {{ request()->routeIs('admin.premium.*') ? 'bg-bleuciel-light' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class=" sidebar-icon h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="sidebar-text"> Dashboard</span>
            </a>
            <a href="{{ route('preniumusers') }}" class="flex items-center p-3  text-black hover:bg-bleuciel-light  transition-colors duration-200 {{ request()->routeIs('admin.premium.*') ? 'bg-bleuciel-light' : '' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class=" sidebar-icon h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
    </svg>
    <span class="sidebar-text"> Premium Users</span>
</a>
            <a href="{{ route('admin.manageUsers') }}" class="flex items-center px-4 py-3  text-black hover:bg-bleuciel-light  transition-colors duration-200 {{ request()->routeIs('admin.premium.*') ? 'bg-bleuciel-light' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class=" sidebar-icon h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span class="sidebar-text"> Utilisateurs</span>
            </a>
            <a href="{{ route('ticket_management') }}" class="flex items-center px-4 py-3  text-black hover:bg-bleuciel-light  transition-colors duration-200 {{ request()->routeIs('admin.premium.*') ? 'bg-bleuciel-light' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class=" sidebar-icon h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                <span class="sidebar-text">  Tickets    </span>
            </a>
            <a href="{{ route('categories.index') }}" class="flex items-center px-4 py-3  text-black hover:bg-bleuciel-light  transition-colors duration-200 {{ request()->routeIs('admin.premium.*') ? 'bg-bleuciel-light' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class=" sidebar-icon h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                <span class="sidebar-text">Catégories   </span>
            </a>
            <a href="{{ route('admin.rapport') }}" class="flex items-center px-4 py-3  text-black hover:bg-bleuciel-light  transition-colors duration-200 {{ request()->routeIs('admin.premium.*') ? 'bg-bleuciel-light' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span class="sidebar-text">Rapports </span>
            </a>
            <a href="#" class="flex items-center px-4 py-3  text-black hover:bg-bleuciel-light  transition-colors duration-200 {{ request()->routeIs('admin.premium.*') ? 'bg-bleuciel-light' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="sidebar-text">  Paramètres</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="flex items-center px-4 py-3 text-black hover:text-red-500 w-full text-left">
        <svg xmlns="http://www.w3.org/2000/svg" class=" sidebar-icon h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/>
        </svg>
        <span class="sidebar-text">  LOGOUT </span>
    </button>
</form>

        </nav>
    </div>
    </div>
    <style>
    @media (max-width: 768px) {
        .sidebar-container {
            width: 60px !important;
        }
        
        .sidebar-nav {
            width: 60px !important;
        }
        
        .sidebar-text {
            display: none;
        }
        
        .sidebar-icon {
            margin-right: 0 !important;
        }
        
        .sidebar-container a, .sidebar-container button {
            justify-content: center;
            padding-left: 0;
            padding-right: 0;
        }
    }
</style>