<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventariado</title>
</head>
<body>
    <header>
        <h1>Inventariado</h1>
        <nav>
            <a href="index.php?controller=item&action=index">Items</a>
            <a href="index.php?controller=item&action=create">Add Item</a>
        </nav>
    </header>
    <main>
        <?php include($view); ?>
    </main>
    <footer>
        <p>&copy; 2023 Inventariado</p>
    </footer>
</body>
</html>
