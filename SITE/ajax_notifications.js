// Fonction pour récupérer les notifications en temps réel
function fetchNotifications() {
    fetch('notifications.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        const notificationsContainer = document.getElementById('notifications');
        notificationsContainer.innerHTML = ''; // Vider les notifications existantes

        // Ajouter les nouvelles notifications
        data.notifications.forEach(notification => {
            const notificationElement = document.createElement('div');
            notificationElement.classList.add('notification');
            notificationElement.innerHTML = notification.message;
            notificationsContainer.appendChild(notificationElement);
        });
    })
    .catch(error => {
        console.error('Erreur lors de la récupération des notifications:', error);
    });
}

// Rafraîchir les notifications toutes les 5 secondes
setInterval(fetchNotifications, 5000);

// Charger les notifications au chargement de la page
document.addEventListener('DOMContentLoaded', fetchNotifications);
