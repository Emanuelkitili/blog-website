<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<?php
if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h1>" . htmlspecialchars($row["title"]) . "</h1>";
        echo "<p>" . nl2br(htmlspecialchars($row["content"])) . "</p>";
        echo "<small>Posted on " . $row["created_at"] . "</small>";
    } else {
        echo "<p>Post not found.</p>";
    }
}
?>
<br><br>
<a href="index.php" class="btn">← Back to Home</a>
</div>
</body>
</html>
