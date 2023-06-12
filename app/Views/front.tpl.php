<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Super site</title>
  <meta name="description" content="ceci est un super site">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/Views/Modules/datatables.css" />
  <script src="/Views/Modules/datatables.js"></script>
</head>

<body>
    <h1>Template Front</h1>

    <!-- inclure la vue -->
    <?php include $this->view;?>

</body>
</html>