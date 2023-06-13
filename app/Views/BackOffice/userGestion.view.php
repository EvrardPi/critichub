<table id="myTable" class="table table-striped" style="width:100%">
    <thead>
      <tr>
        <th>Name</th>
        <th>E-mail</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $row): ?>
        <tr>
            <td><?php echo $row->getFirstname() . ' ' . $row->getLastname(); ?></td>
            <td><?php echo $row->getEmail(); ?></td>
            <td>
                <button type="button" class="btn btn-warning update-btn" data-id="<?php echo $row->getId(); ?>" data-bs-toggle="modal" data-bs-target="#updateModal">Modifier</button>

            </td>
            <td>
                <form method="post" action="delete">
                    <input type="hidden" name="id" value="<?php echo $row->getId(); ?>">
                    <button class="btn btn-danger" type="submit">
                        Supprimer
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <script>
    let data = [
      {
        name: "Youri le BG",
        email: "Youri69@gmail.com",
        role: "Admin",
        button: "Button"
      },
      {
        name: "Pierre l'aigri",
        email: "GoldValo@gmail.com",
        role: "Admin",
        button: "Button"
      }
    ];

    $(document).ready(function () {
      $('#myTable').DataTable({
        data: data,
        columns: [
          { data: "name" },
          { data: "email" },
          { data: "role" },
          { data: "button" }
        ]
      });
    });
  </script>