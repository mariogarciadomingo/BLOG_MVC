<H1>Post  <?php echo $post->id; ?></H1>
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Post</td>
        <td>
            <?php echo $post->id; ?>
        </td>
    </tr>
    <tr>
        <td>Autor</td>
        <td>
            <?php echo $post->author; ?>
        </td>
    </tr>
    <tr>
        <td>Contingut</td>
        <td>
            <?php echo $post->content; ?>
        </td>
    </tr>
    <tr>
        <td>Tematica</td>
        <td>
            <a href='?controller=tematica&action=show&id=<?php echo Tematica::find($post->tematica)->id; ?>'>
                <?php echo Tematica::find($post->tematica)->nom; ?>
            </a>
        </td>
    </tr>
    <tr >
            <td>Imatge</td>
            <td><img src="data:image/png;base64,<?php echo base64_encode($post->image); ?>" alt="Imagen" /></td>
        </tr>
    <tr>
        <td>Accions</td>
        <td> <a href='?controller=posts&action=update&id=<?php echo $post->id; ?>' class='btn btn-info left-margin'>Modificar</a>
            <a href='?controller=posts&action=doDelete&id=<?php echo $post->id; ?>' class='btn btn-danger delete-product'>Eliminar</a>
        </td>
    </tr>
</table>