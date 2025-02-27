<?php

require_once 'database.php';

$sql = "SELECT * FROM produtos LIMIT 9";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">WJ INFORMATICA</h1>
            <nav>
                <a href="login.php" class="btn btn-light me-2">Login</a>
                <a href="registro.php" class="btn btn-light me-2">Registrar</a>
                <a href="carrinho.php" class="btn btn-warning">
                    <i class="bi bi-cart"></i>
                </a>
            </nav>
        </div>
    </header>

    <?php if (isset($_COOKIE['usuario_nome'])): ?>
        <div class="alert alert-success" role="alert">
            Login realizado com sucesso! Bem-vindo, <?php echo htmlspecialchars($_COOKIE['usuario_nome']); ?>.
        </div>
    <?php endif; ?>

    <section class="card-container">
        <div class="card" style="width: 18rem;">
            <img src="https://imgs.search.brave.com/iYSLTyJ93k2uSyh4thuFimqxjuIgEg9OELb8jo56scU/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/MzFvT29adFJPb0wu/anBn" class="card-img-top" alt="Produto 1">
            <div class="card-body">
                <h5 class="card-title">Produto 1</h5>
                <p class="card-text">Notebook XYZ, com 8GB de RAM e 512GB de SSD.</p>
                <p class="card-text"><strong>Preço: R$ 2.499,00</strong></p>
                <a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img src="https://imgs.search.brave.com/6d0u5tMr67vWjai01xI8ssYUtIaUqJtFa7H1-70OLVU/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly93d3cu/bGcuY29tL2NvbnRl/bnQvZGFtL2NoYW5u/ZWwvd2Ntcy9ici9p/bWFnZXMvbW9uaXRv/cmVzLzI0bTM4aC1i/X2F3el9lc3NwX2Jy/X2MvZ2FsbGVyeS9s/YXJnZTAxLmpwZw" class="card-img-top" alt="Produto 2">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Monitor LED 24", resolução Full HD.</p>
                <p class="card-text"><strong>Preço: R$ 899,00</strong></p>
                <a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
                <p id="mensagem" class="mt-3 text-success" style="display: none;">✅ Adicionado com sucesso!</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img src="https://imgs.search.brave.com/6y2qdV9t2ucWtOc1n9NJFCz6uRMS3GkPbt6ggeE8sbw/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NDFtaytGVy1sdkwu/anBn" class="card-img-top" alt="Produto 3">
            <div class="card-body">
                <h5 class="card-title">
                    <p class="card-text">Teclado mecânico RGB, com switches Cherry MX.</p>
                    <p class="card-text"><strong>Preço: R$ 399,00</strong></p>
                    <a href="#" class="btn btn-primary" onclick="mostrarMensagem(event)">Adicionar ao carrinho</a>
                    <p id="mensagem" class="mt-3 text-success" style="display: none;">✅ Adicionado com sucesso!</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img src="https://imgs.search.brave.com/RS3o4t8FDWjIHQ2MpaBQJEZ13zxgxEJgmaEeuqy7EtE/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NTF1RmM4MHZEb0wu/anBn" class="card-img-top" alt="Produto 4">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Mouse gamer com 16.000 DPI e iluminação RGB.</p>
                <p class="card-text"><strong>Preço: R$ 249,00</strong></p>
                <a href="#" class="btn btn-primary" onclick="mostrarMensagem(event)">Adicionar ao carrinho</a>
                <p id="mensagem" class="mt-3 text-success" style="display: none;">✅ Adicionado com sucesso!</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img src="https://imgs.search.brave.com/CUf-mcY7nn41g2SBDxCv2UAVTpQWKl4zidP2M4yMbtk/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly93d3cu/Y25uYnJhc2lsLmNv/bS5ici93cC1jb250/ZW50L3VwbG9hZHMv/c2l0ZXMvMTIvMjAy/NC8wOC9FZGlmaWVy/LmpwZz93PTY3OQ" class="card-img-top" alt="Produto 5">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Fones de ouvido com cancelamento de ruído e microfone.</p>
                <p class="card-text"><strong>Preço: R$ 599,00</strong></p>
                <a href="#" class="btn btn-primary" onclick="mostrarMensagem(event)">Adicionar ao carrinho</a>
                <p id="mensagem" class="mt-3 text-success" style="display: none;">✅ Adicionado com sucesso!</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img src="https://imgs.search.brave.com/cjXuYYuvtKH3dfD0i8VpBF3iLUixS0DTTl1FzZ2R0Zg/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NjFKOXRlU3hCK0wu/anBn" class="card-img-top" alt="Produto 6">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Gabinete ATX com ventilação otimizada e RGB.</p>
                <p class="card-text"><strong>Preço: R$ 299,00</strong></p>
                <a href="#" class="btn btn-primary" onclick="mostrarMensagem(event)">Adicionar ao carrinho</a>
                <p id="mensagem" class="mt-3 text-success" style="display: none;">✅ Adicionado com sucesso!</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img src="https://imgs.search.brave.com/XG5XG-UPkrHXd54ttCvu-wwvt95OkXMtXm21xeTVg1M/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMudGNkbi5jb20u/YnIvaW1nL2ltZ19w/cm9kLzQ4Njc1MC8x/ODBfcGxhY2FfbWFl/X2JyYXppbHBjX2gz/MTBfbV8yXzExNTFf/ZGRyNF84NDI5XzFf/MmU5YmFlNjgxNGI2/ZTdkZWZhMTE2NWU0/OTFkZTRjYjcuanBn" class="card-img-top" alt="Produto 7">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">placa mae .</p>
                <p class="card-text"><strong>Preço: R$ 199,00</strong></p>
                <a href="#" class="btn btn-primary" onclick="mostrarMensagem(event)">Adicionar ao carrinho</a>
                <p id="mensagem" class="mt-3 text-success" style="display: none;">✅ Adicionado com sucesso!</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="https://imgs.search.brave.com/xLGyKu5bIlNCu_kkNU53C0mfriKbesbGG_Z86y8kAKg/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NzFOY1FzS2xJdkwu/anBn" class="card-img-top" alt="Produto 7">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Fonte de alimentação 600W, 80+ Bronze.</p>
                <p class="card-text"><strong>Preço: R$ 199,00</strong></p>
                <a href="#" class="btn btn-primary" onclick="mostrarMensagem(event)">Adicionar ao carrinho</a>
                <p id="mensagem" class="mt-3 text-success" style="display: none;">✅ Adicionado com sucesso!</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="https://imgs.search.brave.com/5f8yn_NHC56t8gdYCiNYlennElKa9CL2cFROLCk4J0o/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/dGVyYWJ5dGVzaG9w/LmNvbS5ici9wcm9k/dXRvL3AvcGxhY2Et/ZGUtdmlkZW8tYXNy/b2NrLXJhZGVvbi1y/eC02NjAwLWNoYWxs/ZW5nZXItZC04Z2It/Z2RkcjYtZnNyLXJh/eS10cmFjaW5nLTkw/LWdhMnJ6ei0wMHVh/bmZfMTMzMzUyLmpw/Zw" class="card-img-top" alt="Produto 7">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Placa de video AMD </p>
                <p class="card-text"><strong>Preço: R$ 1099,00</strong></p>
                <a href="#" class="btn btn-primary" onclick="mostrarMensagem(event)">Adicionar ao carrinho</a>
                <p id="mensagem" class="mt-3 text-success" style="display: none;">✅ Adicionado com sucesso!</p>
            </div>
        </div>
    </section>

    <style>
        .card-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            padding: 1.5rem;
        }

        .card {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            flex-grow: 2;
        }
    </style>
    </section>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 WJ informatica. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function mostrarMensagem(event) {
            event.preventDefault();
            document.getElementById("mensagem").style.display = "block";
            setTimeout(() => {
                document.getElementById("mensagem").style.display = "none";
            }, 2000);
        }
    </script>
</body>

</html>