<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="/js/filmes.js" defer></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Filmes</h1>

        <form id="filmeForm">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Gênero</label>
                <input type="text" class="form-control" id="genero" required>
            </div>
            <div class="mb-3">
                <label for="ano" class="form-label">Ano</label>
                <input type="number" class="form-control" id="ano" required>
            </div>
            <div class="mb-3">
                <label for="duracao" class="form-label">Duração (min)</label>
                <input type="number" class="form-control" id="duracao" required>
            </div>
            <div class="mb-3">
                <label for="diretor" class="form-label">Diretor</label>
                <input type="text" class="form-control" id="diretor" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Filme</button>
        </form>

        <h2 class="mt-5">Lista de Filmes</h2>
        <ul id="filmeList" class="list-group mt-3"></ul>
    </div>
</body>
</html>
