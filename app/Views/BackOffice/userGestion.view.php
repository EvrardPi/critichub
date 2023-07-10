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


<table id="myTable" class="display table table-hover table-bordered table-striped" style="width:60vw;">
    <button type="button" class="btn btn-success btn-spacing" data-bs-toggle="modal" data-bs-target="#createModal">
    Créer un nouvel utilisateur
    </button>
    <thead>
    <tr>
        <th>Name</th>
        <th>E-mail</th>
        <th>Role</th>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Création d'un utilisateur</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $this->partial("form", $createForm) ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modification d'un utilisateur</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-form-row">
                <div class="modal-left-element">
                <label for="update-form-firstname"><b>Prénom</b></label>
                <label for="update-form-firstname"><b>Nom</b></label>
                <label for="update-form-firstname"><b>E-mail</b></label>
                <label for="update-form-firstname"><b>Rôle</b></label>
                <label for="update-form-firstname"><b>Date de naissance</b></label>
                </div>
                <div class="modal-right-element">
                    <?php $this->partial("form", $updateForm); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


<script src="/assets/js/userBackoffice/userDatatable.js"></script>


</body>
</html>


