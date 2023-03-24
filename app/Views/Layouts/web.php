 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Dashboard</title>

    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">
 </head>
 <body>

   <nav class="navbar navbar-expand-lg mb-3">
      <div class="container-fluid">
         <a class="navbar-brand">Shield</a>
         <div class="collapse navbar-collapse">
            <!-- <ul class="navbar-nav">
               <li class="nav-item">
                  <a href="<?= base_url() ?>/dashboard/Categoria" class="nav-link">Categoria</a>
               </li>
               <li class="nav-item">
                  <a href="<?= base_url() ?>/dashboard/Pelicula" class="nav-link">Películas</a>
               </li>
               <li class="nav-item">
                  <a href="<?= base_url() ?>/dashboard/Etiqueta" class="nav-link">Etiquetas</a>
               </li>
            </ul> -->
         </div>
      </div>
   </nav>
   <div class="container">

      
      <div class="card">
         <div class="card-header">
            <h1><?= $this->renderSection('header') ?></h1>
         </div>
         <div class="card-body">            
            
            <?= $this->renderSection('contenido') ?>
         </div>
      </div>
   </div>

   <script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>

 </body>
 </html>