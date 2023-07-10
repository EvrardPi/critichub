<div class="datatables-div">
<?php if (!empty($errors)): ?>
    <div class="errors alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>


<table id="myTable" class="table table-striped" style="width:50vw;">
    <button type="button" class="btn btn-success btn-spacing" data-bs-toggle="modal" data-bs-target="#createModal">
        Créer une nouvelle catégorie
    </button>
    <thead>
    <tr>
        <th>Name</th>
        <th>Picture</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>


<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Création d'une catégorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $this->partial("form", $createForm); ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier la catégorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $this->partial("form", $updateForm); ?>
                <img id="image-preview" src="#" alt="Image Preview" />
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script src="/assets/js/categoryBackoffice/categoryDatatable.js"></script>


</body>
</html>
