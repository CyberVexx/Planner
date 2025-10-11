<?php
require_once '../../classes/postItManager.class.php';
require_once '../../classes/postIt.class.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postItManager = new PostItManager();
    $postIt = new PostIt();

    $appliedPostIt = $postItManager->applyForm($postIt, $_POST);
    $postItManager->addPostIt($appliedPostIt);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add post it</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<form method="POST">
    <div class="form-group">
        <label for="title">Title:</label>
        <input id="title" type="text" name="title">
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
    </div>

    <div class="form-group">
        <label for="content">Content:</label>
        <input id="content" type="text" name="content">
    </div>

    <div class="form-group">
        <label for="date">Date:</label>
        <input id="date" type="date" name="date">
    </div>

    <div class="form-group">
        <label>
            <select name="week">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </label>
    </div>

    <div class="form-group">
        <label for="color">Color:</label>
        <label>
            <input type="color" name="color">
        </label>
    </div>

    <button type="submit">Add</button>
</form>
</body>
</html>