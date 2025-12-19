<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/stat/form/result" method="get">
        <label for="filtre">Profit par : </label>
        <select name="filtre" id="filtre">
            <option value="1">jour</option>
            <option value="2">mois</option>
            <option value="3">annee</option>
        </select>
        <input type="submit" value="valider">
    </form>

    <?php if(!empty($stats)){ ?>
            <table>
                <?php foreach($stats as $s) { ?>
                    <tr>
                        <td><?=$s['res_filtre']?></td>
                        <td><?=$s['profit']?></td>
                    </tr>
              <?php  } ?>
            </table>
    <?php } ?>
</body>
</html>