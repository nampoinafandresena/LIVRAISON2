<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Livraisons</title>

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
            padding: 25px 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.2em;
        }

        header p {
            margin-top: 8px;
            font-size: 1em;
            opacity: 0.9;
        }

        main {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .menu {
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .menu li a {
            display: block;
            background: white;
            padding: 20px;
            text-decoration: none;
            color: #2c3e50;
            font-weight: bold;
            border-radius: 6px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .menu li a:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px;
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
    <ul class="menu">
        <li><a href="/colis/liste">📦 Liste des colis</a></li>
        <li><a href="/colis/form">➕ Ajouter un colis</a></li>
        <li><a href="/colis/livraisons/combined">🚚 Liste des livraisons</a></li>
        <li><a href="/colis/formlivr">➕ Nouvelle livraison</a></li>
        <li><a href="/colis/stat">📊 Statistiques</a></li>
    </ul>
</main>

<footer>
    &copy; 2025 — Application de gestion des livraisons
</footer>

</body>
</html>
