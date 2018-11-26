
<h2>Actualitzar Temàtica<h2>
<form action="?controller=tematica&action=doUpdate" method="post">
    <table class='table table-hover table-responsive table-bordered'>
    <tr>
            <td>Id</td>
            <td><input type='text' name='id' class='form-control' readonly value = <?php echo $tematica->id; ?>  ></td>
        </tr>
        <tr>
            <td>Nom</td>
            <td><input type='text' name='nom' class='form-control' value = <?php echo $tematica->nom; ?>  ></td>
        </tr>
        
        <tr>
            <td>Descripció</td>
            <td><input type='text' name='descripcio' class='form-control' value = '<?php echo $tematica->descripcio; ?>'></td>
        </tr>
        <tr>
            <td>Interés</td>
            <td><input type='text' name='interes' class='form-control' value = '<?php echo $tematica->interes; ?>'></td>
            </tr>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Actualitzar</button>
            </td>
        </tr>
    </table>
</form>