<?php
require_once '../classes/postItManager.class.php';
require_once '../classes/postIt.class.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$postItManager = new PostItManager();
$postIt = null;

if (isset($_GET['postItId'])) {
    $postItId = (int)$_GET['postItId'];
    $postIt = $postItManager->getPostItById($postItId);
}

$title = $postIt ? $postIt->getTitle() : '';
$description = $postIt ? $postIt->getDescription() : '';
$content = $postIt ? $postIt->getContent() : '';
$date = $postIt ? $postIt->getDate() : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postItManager = new PostItManager();
    $postItId = isset($_POST['postItId']) ? (int)$_POST['postItId'] : null;

    if ($postItId) {
        $postItManager->editPostIt($postItId, $_POST);
    } else {
        $newPostIt = new PostIt();
        $postItManager->applyForm($newPostIt, $_POST);
        $postItManager->addPostIt($newPostIt);
    }

    header('Location: index.php');
    exit;
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $postIt ? 'Edit' : 'Add' ?> Post-It</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<form method="POST">
    <input type="hidden" name="postItId" value="<?= $postIt ? $postIt->getId() : '' ?>">

    <div class="form-group">
        <label for="title">Title:</label>
        <input id="title" type="text" name="title" value="<?= htmlspecialchars($title) ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?= htmlspecialchars($description) ?></textarea>
    </div>

    <div class="form-group">
        <label for="content">Content:</label>
        <input id="content" type="text" name="content" value="<?= htmlspecialchars($content) ?>" required>
    </div>

    <div class="form-group">
        <label for="date">Date:</label>
        <input id="date" type="date" name="date" value="<?= $date ?>" required>
    </div>

    <div class="form-group">
        <label for="week">Week:</label>
        <select id="week" name="week">
            <?php for ($i = 1; $i <= 3; $i++): ?>
                <option value="<?= $i ?>" >
                    <?= $i ?>
                </option>
            <?php endfor; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="color">Color:</label>
        <input id="color" type="color" name="color">
    </div>

    <button type="submit"><?= $postIt ? 'Save Changes' : 'Add Post-It' ?></button>
</form>

</body>
</html>