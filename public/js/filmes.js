document.addEventListener('DOMContentLoaded', () => {
    const filmeForm = document.getElementById('filmeForm');
    const filmeList = document.getElementById('filmeList');

    const fetchFilmes = () => {
        fetch('/api/filmes')
            .then(response => response.json())
            .then(filmes => {
                filmeList.innerHTML = '';
                filmes.forEach(filme => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item';
                    li.textContent = `${filme.titulo} - ${filme.genero} (${filme.ano})`;
                    filmeList.appendChild(li);
                });
            });
    };

    fetchFilmes();

    filmeForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const formData = {
            titulo: document.getElementById('titulo').value,
            genero: document.getElementById('genero').value,
            ano: document.getElementById('ano').value,
            duracao: document.getElementById('duracao').value,
            diretor: document.getElementById('diretor').value,
        };

        fetch('/api/filmes', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        })
        .then(response => {
            if (response.ok) {
                fetchFilmes(); // Atualiza a lista de filmes
                filmeForm.reset(); // Limpa o formulário
            } else {
                return response.json().then(errorData => {
                    throw new Error(errorData.message || 'Erro ao adicionar filme');
                });
            }
        })
        .catch(error => console.error('Erro:', error));
    });
});
