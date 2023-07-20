<?php if (!empty($errors)): ?>
    <div class="errors">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<div class="container-comment">
    <h1>Gestion des commentaires</h1>

    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button
                class="nav-link active"
                id="nav-comments-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-comments"
                type="button"
                role="tab"
                aria-controls="nav-comments"
                aria-selected="true"
        >
            Les commentaires à gérer
        </button>
        <button
                class="nav-link"
                id="nav-all-comments-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-all-comments"
                type="button"
                role="tab"
                aria-controls="nav-all-comments"
                aria-selected="false"
        >
            L'ensemble des commentaires validés
        </button>
    </div>

    <div class="tab-content" id="nav-tabContent">
        <div
                class="tab-pane fade show active"
                id="nav-comments"
                role="tabpanel"
                aria-labelledby="nav-comments-tab"
                tabindex="0"
        >
            <br>
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Commentaire</th>
                    <th>Review concernée</th>
                    <th>Auteur</th>
                    <th>Publier</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div
                class="tab-pane fade"
                id="nav-all-comments"
                role="tabpanel"
                aria-labelledby="nav-all-comments-tab"
                tabindex="0"
        >
            <br>
            <table id="myTable2" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>Commentaire</th>
                    <th>Review concernée</th>
                    <th>Auteur</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="/assets/js/commentBackoffice/commentsDatatable.js"></script>

<style>
    .container-comment {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-content: flex-start;
        margin-left: 350px;
        height: 100vh;
    }
</style>
