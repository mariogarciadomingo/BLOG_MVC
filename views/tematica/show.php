<H1><?php echo $tematica->nom; ?></H1>
<table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Id</td>
            <td><?php echo $tematica->id; ?></td>
        </tr>
        <tr>
            <td>Nom</td>
            <td><?php echo $tematica->nom; ?></td>
        </tr>
        <tr>
            <td>Descripció</td>
            <td><?php echo $tematica->descripcio; ?></td>
        </tr>
        <tr>
            <td>Data de Creació</td>
            <td><?php echo $tematica->dataCreacio; ?></td>
        </tr>
        <tr>
            <td>Interés</td>
            <td><?php echo $tematica->interes; ?></td>
        </tr>
        
        <tr>
            <td>Modificar</td>
            <td>
            <a href='?controller=tematica&action=update&id=<?php echo $tematica->id; ?>' class='btn btn-info left-margin'>Modificar</a>
            <a href='?controller=tematica&action=doDelete&id=<?php echo $tematica->id; ?>' class='btn btn-danger delete-product'>Eliminar</a>
        </td>
        </tr>

 </table>