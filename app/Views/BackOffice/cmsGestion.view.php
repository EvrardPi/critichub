<div class="mediaBack">
    <div class="mediaBackContent">
        <?php if (!empty($errors)): ?>
            <div class="errors alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li>
                            <?php echo $error; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>


        <table id="myTable" class="table table-striped ml-5" style="width:100%">
            <button type="button" class="btn btn-success btn-spacing" data-bs-toggle="modal"
                data-bs-target="#createModal">
                Créer une nouvelle catégorie
            </button>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Affiche</th>
                    <th>Auteur</th>
                    <th>Catégories</th>
                    <th>Nombre de vues</th>
                    <th>Date de création</th>
                    <th>Date de la dernière modification</th>
                    <th>Afficher</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script src="/assets/js/cmsBackoffice/cmsDatatable.js"></script>


</body>

</html>