<div class="prototype">

</div>


<?php $this->partial("form", $comments); ?>

<div class="commentaire-section">
    <h2>Commentaires</h2>

    <?php if (isset($_SESSION['isAuth']) && $_SESSION['isAuth'] === true):?>
        <label for="content">Écrit ton commentaire:</label>
        <textarea class="add_comment" rows="5" name="content" placeholder="Entrer votre commentaire ?"></textarea>
        <button class="btn-comment">Envoyer</button>
    <?php else: ?>
        <p>Vous devez être connecté pour poster un commentaire</p>
    <?php endif; ?>
    <div class="scroll-comment">
    <?php foreach (array_reverse($commentData) as $comment): ?>
        <div class="commentaire-content">
            <div class="auth">
                <h3>
                    <?php echo $comment['firstName'] . ' ' . $comment['lastName']; ?>
                </h3>
            </div>
            <div class="content">
                <p>
                    <?php echo $comment['content']; ?>
                </p>
            </div>
            <div class="date-comment">
                <?php echo substr($comment['createdAt'], 0, 16); ?>
            </div>
        </div>
    <?php endforeach; ?>
    </div>



</div>

