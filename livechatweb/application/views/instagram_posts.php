<!DOCTYPE html>
<html>
<head>
    <title>Instagram Posts</title>
</head>
<body>
    <h1>Instagram Posts</h1>
    <div>
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
                    <?php if ($post['media_type'] == 'IMAGE' || $post['media_type'] == 'CAROUSEL_ALBUM'): ?>
                        <img src="<?= $post['media_url'] ?>" alt="Instagram Post" style="width: 100%; max-width: 500px;">
                    <?php elseif ($post['media_type'] == 'VIDEO'): ?>
                        <video controls style="width: 100%; max-width: 500px;">
                            <source src="<?= $post['media_url'] ?>" type="video/mp4">
                        </video>
                    <?php endif; ?>
                    <p><?= $post['caption'] ?? 'No caption' ?></p>
                    <small>Posted on: <?= date('Y-m-d H:i:s', strtotime($post['timestamp'])) ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No posts available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
