<?php
require_once 'classes/postit.class.php';

session_start();

if (isset($_GET['title'])) {
    $postit = new PostIt(
        $_GET['title'],
        $_GET['description'],
        $_GET['content'],
        $_GET['date']
    );

    $postit->setTitle($_GET['title']);
    $postit->applyForm($_GET);

}


if (empty($_SESSION['items'])) {
    $_SESSION['items'] = ['ToDo', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', ''];
}

// if(!isset($_SESSION['coltitle'])) {
//     $coltitle = 'Todo'

// }


$colitems = $_SESSION['items'];

$title = "<h1>Plann<span>i</span>ng</h1>";
?>

<html lang="en">

<head>
    <title>TODO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <fieldset>
        <legend><?php echo $title; ?></legend>

        <div id="flex-container">
            <?php
            foreach ($_SESSION['items'] as $col) {
                echo '<div class="flex-item">';
                $postit = new PostIt(
                    $_GET['title'],
                    $_GET['description'],
                    $_GET['content'],
                    $_GET['date']
                );
                $postit->render();
                echo '</div>';
            }

            ?>


        </div>
    </fieldset>

    <button><a href="add.php">Add new post it</a></button>

    <script src="app.js"></script>
</body>

</html>