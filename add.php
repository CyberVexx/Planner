<?php
    require_once 'classes/postit.class.php';

    if(isset($_GET['title'])) {
        $postit = new PostIt(
            $_GET['title'],
            $_GET['description'],
            $_GET['content'],
            $_GET['date']
        );

        $postit->setTitle($_GET['title']);
        $postit->applyForm($_GET);

        echo $postit->getTitle();
    }

    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add postit</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="GET" action="index.php">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <input type="text" name="content">
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date">
        </div>

        <div class="form-group">
            <select name="week">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>

        <div class="form-group">
            <label for="color">Color:</label>
            <input type="color" name="color">
        </div>

        <input type="submit">
    </form>
</body>
</html>