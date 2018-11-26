<DOCTYPE html>
 <html>
 <head>
 </head>
 <body>
  <header>
   <a href='../blog_php_mvc' class='btn btn-primary left-margin'>Home</a>
   <a href='?controller=posts&action=index' class='btn btn-primary left-margin'>Posts</a>
   <a href='?controller=tematica&action=index' class='btn btn-primary left-margin'>Temàticas</a>
   <a href='?controller=posts&action=create' class='btn btn-primary left-margin'>Insertar Post</a>
   <a href='?controller=tematica&action=create' class='btn btn-primary left-margin'>Insertar Temàtica</a>
   <br>
   <br>
  </header>
  <?php require_once 'routes.php';?>
  <footer>
   Copyright
  </footer>
 </body>
 </html>