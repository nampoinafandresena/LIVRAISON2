<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bénéfices par jour</title>
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
    <h1>Bénéfices par jour</h1>
    <table>
        <thead>
            <tr>
                <th>Jour</th>
                <th>Bénéfice (Ar)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($benefices as $benefice): ?>
            <tr>
                <td><?= htmlspecialchars($benefice['jour']) ?></td>
                <td><?= number_format($benefice['benefice'], 0, ',', ' ') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
