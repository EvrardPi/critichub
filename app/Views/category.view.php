    <div class="category">
        <?php foreach ($rows as $row): ?>
            <div class="col-md-2 text-center ">
                <img src="assets/images/category/<?php echo $row['name']; ?>.png" alt="Image" width="200" height="200">
                <p class="mt-2" style="text-align: center;"><?php echo $row['name']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <script type="module" src="/assets/js/gestionFront/applyFront.js"></script>
