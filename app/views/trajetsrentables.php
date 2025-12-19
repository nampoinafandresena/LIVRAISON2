<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bénéfices maximaux par trajet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .benefice {
            font-weight: bold;
            color: #27ae60;
        }
    </style>
</head>
<body>
    <h1>Bénéfices maximaux par trajet</h1>

    <?php if (empty($resultats)): ?>
        <p>Aucun résultat trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>ID Trajet</th>
                    <th>Bénéfice (Ar)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultats as $trajet): ?>
                    <tr>
                        <td><?= htmlspecialchars($trajet['jour']) ?></td>
                        <td><?= htmlspecialchars($trajet['id_trajet']) ?></td>
                        <td class="benefice"><?= number_format($trajet['benefice'], 0, ',', ' ') ?> Ar</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
