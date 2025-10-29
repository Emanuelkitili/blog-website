<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Simple Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>My Simple Blog</h1>
        <a href="new_post.php" class="btn">+ Add New Post</a>
        <hr>

        <?php
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h2><a href='post.php?id=" . $row["id"] . "'>" . htmlspecialchars($row["title"]) . "</a></h2>";
                echo "<p>" . substr(htmlspecialchars($row["content"]), 0, 150) . "...</p>";
                echo "<small>Posted on " . $row["created_at"] . "</small>";
                echo "</div>";
            }
        } else {
            echo "<p>No posts yet!</p>";
        }
        ?>
    </div>
</body>
</html>
