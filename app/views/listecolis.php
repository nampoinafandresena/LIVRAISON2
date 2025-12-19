<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des colis</title>

    <style>
        header {
    background-color: #2c3e50;
    padding: 0 20px;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 60px;
}

.nav-left {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
    padding: 0;
}

.nav-left li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 0.95em;
}

.nav-left li a:hover {
    text-decoration: underline;
}

.nav-right {
    color: white;
    font-size: 1.4em;
    font-weight: bold;
}

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f8;
            color: #333;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        main {
            padding: 40px 20px;
        }

        table {
            width: 70%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eef2f5;
        }

        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 12px;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.9em;
        }
    </style>
</head>

<body>

<header>
    <nav class="navbar">
        <ul class="nav-left">
            <li><a href="/">Accueil</a></li>
            <li><a href="/colis/liste">Colis</a></li>
            <li><a href="/colis/livraisons/combined">Livraisons</a></li>
            <li><a href="/colis/form">Ajouter colis</a></li>
            <li><a href="/colis/formlivr">Ajouter livraison</a></li>
            <li><a href="/colis/stat">Statistiques</a></li>
        </ul>

        <div class="nav-right">
            ColisExpress
        </div>
    </nav>
</header>


<main>
    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Poids (kg)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($colis)) : ?>
                <?php foreach ($colis as $c) : ?>
                    <tr>
                        <td><?= htmlspecialchars($c['description']) ?></td>
                        <td><?= htmlspecialchars($c['poids']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="2">Aucun colis trouvé</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>

<footer>
    &copy; 2025 — Application de gestion des livraisons
</footer>

</body>
</html>
