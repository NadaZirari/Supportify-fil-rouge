<div class="sidebar-container transition-all duration-300">
    <div class="w-[200px] md:w-auto bg-blue-100 flex-shrink-0 flex flex-col">
        <nav class="flex-1 py-4 bg-blue-100 fixed h-screen sidebar-nav">
            <div class="p-3 ml-8 md:ml-0 font-bold text-xl border-b text-blue-500 flex items-center">
                <i class="fas fa-headset mr-2"></i>
                <span class="sidebar-text">Supportify</span>
            </div>
            <div>
                <a href="{{ route('profile.show') }}" class="flex items-center px-4 py-3 text-black hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sidebar-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class=" sidebar-text ml-3 sidebar-text">Profil</span>
                </a>
                
                <a href="{{route('agent.dashboard') }}" class="flex items-center px-4 py-3 text-black hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sidebar-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class=" sidebar-text ml-3 sidebar-text">My Dashboard</span>
                </a>
                
                <a href="{{ route('TicketAgent') }}" class="flex items-center px-4 py-3 text-black hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sidebar-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    <span class=" sidebar-text ml-3 sidebar-text">Mes Tickets</span>
                </a>
                
                
                
                
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center px-4 py-3 text-black hover:text-red-500 w-full text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sidebar-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/>
                    </svg>
                    <span class="sidebar-text ml-3 sidebar-text">LOGOUT</span>
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
