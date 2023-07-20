<div class="prototype">

</div>

<?php $this->partial("form", $comments); ?>

<?php foreach (array_reverse($commentData) as $comment): ?>
    <div><?php echo $comment['firstName'] . ' ' . $comment['lastName']; ?></div>
    <div><?php echo $comment['content']; ?></div>
    <div><?php echo substr($comment['createdAt'], 0, 16); ?></div>
    <hr>
<?php endforeach; ?>


<script>
    console.log('test');
    const input = document.getElementById('create-form-comment-content');

    input.addEventListener('input', (event) => {
        const text = event.target.value;
        const maxLength = 80;

        if (text.length > maxLength) {
            const lines = Math.ceil(text.length / maxLength);
            let formattedText = '';

            for (let i = 0; i < lines; i++) {
                formattedText += text.substr(i * maxLength, maxLength) + '\n';
            }

            event.target.value = formattedText.trim();
        }
    });
</script>

