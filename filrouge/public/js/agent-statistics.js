document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('ticketsChart').getContext('2d');

    const openTickets = document.getElementById('ticketsChart').dataset.open;
    const inProgressTickets = document.getElementById('ticketsChart').dataset.inprogress;
    const resolvedTickets = document.getElementById('ticketsChart').dataset.resolved;

    const ticketsChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Ouverts', 'En Cours', 'Résolus'],
            datasets: [{
                label: 'Tickets',
                data: [openTickets, inProgressTickets, resolvedTickets],
                backgroundColor: [
                    '#f87171',
                    '#60a5fa',
                    '#34d399'
                ],
                borderColor: [
                    '#f87171',
                    '#60a5fa',
                    '#34d399'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
});
