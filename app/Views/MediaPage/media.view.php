<div class="prototype">

</div>

<?php $this->partial("form", $comments); ?>

<?php foreach (array_reverse($commentData) as $comment): ?>
    <div><?php echo $comment['firstName'] . ' ' . $comment['lastName']; ?></div>
    <div><?php echo $comment['content']; ?></div>
    <div><?php echo substr($comment['createdAt'], 0, 16); ?></div>
    <hr>
<?php endforeach; ?>

