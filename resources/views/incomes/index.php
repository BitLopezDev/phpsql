<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/index.css">
    <title>Lista de ingresos</title>
</head>

<body>

    <h1>Lista de ingresos</h1>

    <main>

<<<<<<< HEAD
        <table>
            <tr>
                <th>Método de pago</th>
                <th>Tipo de ingreso</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Descripción</th>
            </tr>
=======
   
>>>>>>> 8ad25e8bddb6be949e54b1671fdc090bdf9f09b9

            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr>
                        <td>
                            <?= $result["payment_method"] ?>
                        </td>
                        <td>
                            <?= $result["type"] ?>
                        </td>
                        <td>
                            <?= $result["date"] ?>
                        </td>
                        <td>
                            <?= $result["amount"] ?>
                        </td>
                        <td>
                            <?= $result["description"] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

        <a class="button-link" href="create/">Agregar nuevo ingreso</a>

    </main>

</body>

</html>