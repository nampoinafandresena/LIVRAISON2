<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bénéfices par véhicule</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Bénéfices par véhicule</h1>

    <table id="beneficesTable">
        <thead>
            <tr>
                <th>ID Véhicule</th>
                <th>Nom du Véhicule</th>
                <th>Bénéfice (Ar)</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($benefices as $row): ?>
    <tr>
        <td><?= htmlspecialchars($row['id_vehicule']) ?></td>
        <td><?= htmlspecialchars($row['immatriculation']) ?></td>
        <td><?= number_format($row['benefice'], 2, ',', ' ') ?></td>
    </tr>
<?php endforeach; ?>

        </tbody>
    </table>
</body>
</html>
