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