<p><strong>Listado de las temàticas:</strong></p>
<table class='table table-hover table-responsive table-bordered'>
  <tr>
    <th>Nom</th>
    <th>Actions</th>
  </tr>

  <?php foreach ($tematicas as $tematica) {?>
  <tr>
    <td>
      <?php echo $tematica->nom; ?>
    </td>

    <td>

      <a href='?controller=tematica&action=show&id=<?php echo $tematica->id; ?>' class='btn btn-primary left-margin'>Ver
        contenido</a>

      <a href='?controller=tematica&action=update&id=<?php echo $tematica->id; ?>' class='btn btn-info left-margin'>Modificar</a>


      <a href='?controller=tematica&action=doDelete&id=<?php echo $tematica->id; ?>' class='btn btn-danger delete-product'>Eliminar</a>
    </td>
  </tr>

  <?php }?>
</table>