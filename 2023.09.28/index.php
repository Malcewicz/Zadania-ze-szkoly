<?php

session_start();

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Newsletter - zapisz się!</title>
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
</head>

<body>
    <div class="container">

        <header>
            <h1>Newsletter</h1>
        </header>

        <main>
            <article>
                <form method="post" action="save.php">
                    <label>Podaj adres e-mail
                        <?php
                        echo "<input type='email' name='email' value='{$_SESSION['email']}'>"
                        ?>
                    </label>
                    <input type="submit" value="Zapisz się!">
                </form>
                <?php
                if (isset($_SESSION['error'])) {
                    echo "<p>{$_SESSION['error']}</p>";
                    unset($_SESSION['error']);
                }
                ?>
            </article>
            <!-- MB -->
        </main>

    </div>
</body>

</html>