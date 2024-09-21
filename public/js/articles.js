
    // Fonction pour formater la date actuelle au format "JJ/MM/AAAA"
    function formatDate(date) {
        const options = { day: '2-digit', month: '2-digit', year: 'numeric' };
        return date.toLocaleDateString('fr-FR', options);
    }

    // Affichage de la date dans les éléments avec les ID "date1", "date2", et "date3"
    document.getElementById('date1').textContent = formatDate(new Date());
    document.getElementById('date2').textContent = formatDate(new Date());
    document.getElementById('date3').textContent = formatDate(new Date());

    // Fonction pour afficher/masquer les articles en fonction de la visibilité
    function handleIntersection(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                entry.target.classList.remove('hidden');
            } else {
                entry.target.classList.add('hidden');
                entry.target.classList.remove('visible');
            }
        });
    }

    // Créer un nouvel Intersection Observer
    const observer = new IntersectionObserver(handleIntersection, {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    });

    // Observer chaque article
    const articles = document.querySelectorAll('.card-custom');
    articles.forEach(article => {
        observer.observe(article);
    });
