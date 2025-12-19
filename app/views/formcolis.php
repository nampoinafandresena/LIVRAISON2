<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un colis</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f8;
            color: #333;
        }

        /* ===== HEADER / NAVBAR ===== */
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

        /* ===== MAIN ===== */
        main {
            padding: 40px 20px;
        }

        h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            width: 400px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1f2d3a;
        }

        /* ===== FOOTER ===== */
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
    <h3>📦 Ajouter un nouveau colis</h3>

    <form action="/colis/insert" method="post">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" required>

        <label for="poids">Poids (kg)</label>
        <input type="number" name="poids" id="poids" step="0.01" required>

        <input type="submit" value="Ajouter le colis">
    </form>
</main>

<footer>
    &copy; 2025 — ColisExpress
</footer>

</body>
</html>
