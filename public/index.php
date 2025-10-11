<?php
require_once '../classes/postIt.class.php';
require_once '../classes/postItManager.class.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['items'])) {
    $_SESSION['items'] = ['ToDo', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', ''];
}

$colItems = $_SESSION['items'];

$title = "<h1>Plann<span>i</span>ng</h1>";

if (isset($_POST['editPostIt'])) {
    $postItId = (int)$_POST['postItId'];
    header("Location: addOrEdit.php?postItId=$postItId");
    exit;
}

if (isset($_POST['deletePostIt'])) {
    $postItManager = new PostItManager();
    // cast naar een int! (anders is het een string)
    $postItId = (int)$_POST['postItId'];
    $postItManager->removePostIt($postItId);
}
?>

<html lang="en">

<head>
    <title>TODO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <fieldset>
        <legend><?php echo $title; ?></legend>

        <div id="flex-container">
            <?php
            $postItArray = $_SESSION['postIts'];
            foreach ($_SESSION['items'] as $col) {
                echo '<div class="flex-item">';
                if (!empty($postItArray)) {
                    foreach ($postItArray as $postIt) {
                        $postIt->render();
                    }
                }
                echo '</div>';
            }

            ?>


        </div>
    </fieldset>

    <button>
        <a href="addOrEdit.php">Add new post it</a>
    </button>

    <script src="js/app.js"></script>
</body>

</html>