
const searchInput = document.getElementById('search');
const resultsDiv = document.getElementById('results');

searchInput.addEventListener('input', function() {
    const searchTerm = searchInput.value.trim();
    if (searchTerm !== ' ') {
        fetch('/articles/search/' + searchTerm)
            .then(response => response.json())
            .then(data => {
                resultsDiv.innerHTML = '';
                if (data.length > 0) {
                    data.forEach(article => {
                        const articleHTML = `
                            <h2>${article.title}</h2>
                            <p>${article.content}</p>
                            <img src="${article.thumbnail}" alt="${article.title}">
                        `;
                        resultsDiv.insertAdjacentHTML('beforeend', articleHTML);
                    });
                } else {
                    resultsDiv.innerHTML = 'Aucun article trouvé';
                }
            });
    } else {
        resultsDiv.innerHTML = '';
    }
});
