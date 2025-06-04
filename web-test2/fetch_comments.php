<?php
require 'db.php';

$post_id = $_GET['post_id'];
$stmt = $pdo->prepare("SELECT c.content, u.username FROM comments c JOIN users u ON c.user_id = u.id WHERE c.post_id = ?");
$stmt->execute([$post_id]);

while ($comment = $stmt->fetch()) {
    echo "<div class='comment'><strong>" . htmlspecialchars($comment['username']) . ":</strong> " . htmlspecialchars($comment['content']) . "</div>";
}
