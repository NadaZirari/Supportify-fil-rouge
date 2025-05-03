function filterTickets() {
    const statusFilter = document.getElementById('statusFilter').value;
    const categoryFilter = document.getElementById('categoryFilter').value;
    const agentFilter = document.getElementById('agentFilter').value;
    const searchText = document.getElementById('searchInput').value.toLowerCase();
    
    const ticketRows = document.querySelectorAll('tbody tr');
    
    ticketRows.forEach(row => {
        const status = row.getAttribute('data-status');
        const category = row.getAttribute('data-category');
        const agent = row.getAttribute('data-agent');
        const title = row.getAttribute('data-title');
        const description = row.getAttribute('data-description');
        
       
        const matchesStatus = statusFilter === 'All Status' || status === statusFilter;
        const matchesCategory = categoryFilter === '' || category === categoryFilter;
        const matchesAgent = agentFilter === '' || agent === agentFilter;
        const matchesSearch = searchText === '' || 
                             title.includes(searchText) || 
                             description.includes(searchText);
        
        
        if (matchesStatus && matchesCategory && matchesAgent && matchesSearch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}


document.addEventListener('DOMContentLoaded', function() {
    const filters = ['statusFilter', 'categoryFilter', 'agentFilter'];
    
    filters.forEach(filterId => {
        const filter = document.getElementById(filterId);
        if (filter) {
            filter.addEventListener('change', filterTickets);
        }
    });
    
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', filterTickets);
    }
    
    const searchButton = document.getElementById('searchButton');
    if (searchButton) {
        searchButton.addEventListener('click', filterTickets);
    }
});