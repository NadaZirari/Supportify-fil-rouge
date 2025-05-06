function filterTickets() {
    const statusFilter = document.getElementById('statusFilter').value;
    const prioriteFilter = document.getElementById('prioriteFilter').value.toLowerCase();
    const searchText = document.getElementById('searchInput').value.toLowerCase();
    const ticketRows = document.querySelectorAll('tbody tr');
    
    ticketRows.forEach(row => {
        const status = row.querySelector('td:nth-child(5) span').innerText.toLowerCase().trim().replace(' ', '_');        const priority = row.querySelector('td:nth-child(4) span').innerText.toLowerCase().trim();
        const title = row.querySelector('td:nth-child(1)').innerText.toLowerCase().trim();
        
       
        const matchesStatus = statusFilter === 'tous' || status === statusFilter;
        const matchesPriorite = prioriteFilter === 'toutes' || priority === prioriteFilter;
        const matchesSearch = searchText === '' || 
                             title.includes(searchText) ;
        
        if (matchesStatus && matchesPriorite && matchesSearch  ) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}


document.addEventListener('DOMContentLoaded', function() {
    const filters = ['statusFilter', 'prioriteFilter'];
    
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
    
});