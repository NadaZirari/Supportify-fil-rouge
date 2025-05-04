function filterTickets() {
    const statusFilter = document.getElementById('statusFilter').value;
    const prioriteFilter = document.getElementById('prioriteFilter').value.toLowerCase();
    const searchText = document.getElementById('searchInput').value.toLowerCase();
    const dateFilter =document.getElementById('dateFilter').value;
    const ticketRows = document.querySelectorAll('tbody tr');
    
    ticketRows.forEach(row => {
        const status = row.querySelector('td:nth-child(4) span').innerText.toLowerCase();
        const priority = row.querySelector('td:nth-child(3) span').innerText.toLowerCase();
        const title = row.querySelector('td:nth-child(1)').innerText.toLowerCase();
        const dateText = row.querySelector('td:nth-child(2)').innerText;
        
        let ticketDate = '';
        if (dateText) {
            const parts = dateText.split('/');
            if (parts.length === 3) {
                // Convertir de dd/mm/yyyy à yyyy-mm-dd
                ticketDate = `${parts[2]}-${parts[1]}-${parts[0]}`;
            }
        }
        const matchesStatus = statusFilter === 'All Status' || status.includes(statusFilter.toLowerCase());
        const matchesPriorite = prioriteFilter === 'toutes les priorités' || priority === prioriteFilter;
        const matchesSearch = searchText === '' || 
                             title.includes(searchText) ;
    const matchesDate = dateFilter === '' || ticketDate === dateFilter;
        
        if (matchesStatus && matchesPriorite && matchesSearch  && matchesDate) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}


document.addEventListener('DOMContentLoaded', function() {
    const filters = ['statusFilter', 'prioriteFilter' , 'dateFilter'];
    
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
});