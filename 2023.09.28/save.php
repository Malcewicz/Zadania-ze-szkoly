<?php

session_start();
$db_config = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db' => 'newsletter',
    'db_type' => 'mysql',
    'encoding' => 'utf8'
);

try {
    $dsn = $db_config['db_type'] .
        ':host=' . $db_config['host'] .
        ';dbname=' . $db_config['db'] .
        ';encoding=' . $db_config['encoding'];
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $dbh = new PDO($dsn, $db_config['user'], $db_config['pass'], $options);
    define('DB_CONNECTED', true);
} catch (PDOException $e) {
    die('Nie można połączyć się z bazą danych. Kod błędu: ' . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <title>Zapisanie się do newslettera</title>

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
                <?php

                $email = $_POST['email'];
                $_SESSION['email'] = $email;

                if (empty($email)) {
                    $_SESSION['error'] = "Nie podano adresu e-mail";
                    header("Location: index.php");
                    exit();
                    return;
                }
                try {
                    $sql = "SELECT * FROM users WHERE email = ?";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute([$email]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($result) {
                        $_SESSION['error'] = "Podany adres e-mail jest już zapisany do newslettera";
                        header("Location: index.php");
                        exit();
                        return;
                    }
                    $sql = "INSERT INTO users (email) VALUES (?)";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute([$email]);
                    echo "<p>Wysłano</p>";
                } catch (PDOException $e) {
                    echo "<p>Nie udało się wysłać maila</p>";
                }
                session_destroy();
                ?>
            </article>
        </main>

    </div>

</body>

</html>