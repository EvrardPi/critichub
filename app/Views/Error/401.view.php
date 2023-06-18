<?php include "erreurTemplateTop.php"?>
<h1>401</h1>
<p>Vous n'êtes pas autorisé à accéder à la page ou à la ressource demandée</p>
<?php include "erreurTemplateBot.php"?>
<?php http_response_code(401); ?>
