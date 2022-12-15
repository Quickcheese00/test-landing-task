<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>frontpage</title>
    <link rel="stylesheet" href="/dist/index.css" />
</head>
<body>
<?php
    if (!$_POST) {
        echo "<main>
            <section class=\"main-section\">
                <h2 class=\"main-section__title\">Некорректные данные</h2>
                <a href='/' class=\"form-element__button\">На главную</a>
            </section>
        </main>";

        return;
    }

    $file = 'leads.txt';

    if (!file_exists($file)) {
        touch($file);
    }

    $current = file_get_contents($file);

    $current .= $_POST['name'] . ', ' . $_POST['email'] . ', ' . $_POST['phone'] . "\n";

    file_put_contents($file, $current);

    echo "<main>
    <section class=\"main-section\">
        <h2 class=\"main-section__title\">" . $_POST['name'] . ", ваши данные успешно сохранены</h2>
    </section>
</main>";
?>
</body>
</html>
