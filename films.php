<?php
require_once("database.php");

if (!empty($_GET['id'])) {
    $film_id = intval($_GET['id']);
    try {
        $results =
            $db->prepare(
                "SELECT * FROM film where film_id = ?"
            );
        $results->bindParam(1, $film_id);
        $results->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }


    $film = $results->fetch(PDO::FETCH_ASSOC);
    if ($film == FALSE) {
        echo "Could not find movie with given ID";
        die();
    }
}




?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>PHP Data Objects</title>
    <link rel="stylesheet" href="style.css">

</head>

<body id="home">

    <h1>Sakila Sample Database</h1>

    <h2>
        <?php
        if (isset($film)) {

            echo $film['title'];
        }

        ?>
    </h2>



</body>

</html>