<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des livraisons</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            border-collapse: collapse;
            width: 95%;
            margin: auto;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
            font-size: 0.95em;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
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
                <th>ID</th>
                <th>Colis</th>
                <th>Poids (kg)</th>
                <th>Entrepôt</th>
                <th>Destination</th>
                <th>Statut</th>
                <th>Livreur</th>
                <th>Salaire</th>
                <th>Véhicule</th>
                <th>Carburant</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($livraisons)) : ?>
                <?php foreach ($livraisons as $l) : ?>
                    <tr>
                        <td><?= htmlspecialchars($l['id_livraison']) ?></td>
                        <td><?= htmlspecialchars($l['colis_description']) ?></td>
                        <td><?= htmlspecialchars($l['colis_poids']) ?></td>
                        <td><?= htmlspecialchars($l['entrepot_adresse']) ?></td>
                        <td><?= htmlspecialchars($l['destination']) ?></td>
                        <td><?= htmlspecialchars($l['status']) ?></td>
                        <td><?= htmlspecialchars($l['livreur_nom']) ?></td>
                        <td><?= htmlspecialchars($l['livreur_salaire']) ?> Ar</td>
                        <td><?= htmlspecialchars($l['vehicule_immatriculation']) ?></td>
                        <td><?= htmlspecialchars($l['carburant']) ?></td>
                        <td><?= htmlspecialchars($l['date_livraison']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="11">Aucune livraison trouvée</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Colis</th>
            <th>Poids (kg)</th>
            <th>Destination</th>
            <th>Carburant</th>
            <th>Chauffeur</th>
            <th>Salaire</th>
            <th>Revenu colis</th>
            <th>Coût livraison</th>
            <th>Profit</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($livraisonsR as $l): ?>
        <tr>
            <td><?= $l['id_livraison'] ?></td>
            <td><?= htmlspecialchars($l['colis_description']) ?></td>
            <td><?= $l['colis_poids'] ?></td>
            <td><?= htmlspecialchars($l['destination']) ?></td>
            <td><?= $l['carburant'] ?> Ar</td>
            <td><?= htmlspecialchars($l['livreur_nom']) ?></td>
            <td><?= $l['salaire_livreur'] ?> Ar</td>
            <td><?= $l['revenu_colis'] ?> Ar</td>
            <td><?= $l['cout_livraison'] ?> Ar</td>
            <td><?= $l['profit'] ?> Ar</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>

<footer>
    &copy; 2025 — Application de gestion des livraisons
</footer>

</body>
</html>
