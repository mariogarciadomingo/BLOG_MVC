
<h2>Actualitzar Post<h2>
<form action="?controller=posts&action=doUpdate" method="post">
    <table class='table table-hover table-responsive table-bordered'>
    <tr>
            <td>Id</td>
            <td><input type='text' name='id' class='form-control' readonly value = <?php echo $post->id; ?>  ></td>
        </tr>
        <tr>
            <td>Titol</td>
            <td><input type='text' name='titol' class='form-control' value = <?php echo $post->title; ?>  ></td>
        </tr>
        
        <tr>
            <td>Autor</td>
            <td><input type='text' name='autor' class='form-control' value = '<?php echo $post->author; ?>'></td>
        </tr>
        <tr>
            <td>Contingut</td>
            <td><input type='text' name='contingut' class='form-control' value = '<?php echo $post->content; ?>'></td>
        </tr>
        <tr>
            <td>Imatge</td>
            <td><input type="file" name="imatge" /></td>
            </tr>
        </tr>
        <tr>
            <td>Temàtica</td>
            <td>
                <select class='form-control' name='tematica'>
                <?php 
                echo    "<option value='".$tematica->id."'>".Tematica::find($post->tematica)->nom."</option>"
                ?>
            
                <?php foreach ($tematicas as $tem) {
                    if($tem->id!=$post->tematica)
                echo "<option value='$tem->id'>$tem->nom</option>";
                }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Actualitzar</button>
            </td>
        </tr>
    </table>
</form>