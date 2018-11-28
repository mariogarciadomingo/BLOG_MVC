<h1><strong>Listado de los posts:</strong></h1>
<table class='table table-hover table-responsive table-bordered'>
  <tr>
    <th>Titol</th>
    <th>Autor</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($posts as $post) {?>
  <tr>
    <td>
      <?php echo $post->title; ?>
    </td>
    <td>
      <?php echo $post->author; ?>
    </td>
    <td>
      <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>' class='btn btn-primary left-margin'>Ver contenido</a>
      <a href='?controller=posts&action=update&id=<?php echo $post->id; ?>' class='btn btn-info left-margin'>Modificar</a>
      <a href='?controller=posts&action=doDelete&id=<?php echo $post->id; ?>' class='btn btn-danger delete-product'>Eliminar</a>
    </td>
  </tr>
  <?php }?>
</table>