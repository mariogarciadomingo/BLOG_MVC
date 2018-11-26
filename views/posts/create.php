<h2>Insertar Post<h2>
<form action="?controller=posts&action=doCreate" method="post" enctype="multipart/form-data">
    <table class='table table-hover table-responsive table-bordered'>
    <tr>
            <td>Titol</td>
            <td><input type='text' name='titol' class='form-control' /></td>
        </tr>
        <tr>
            <td>Autor</td>
            <td><input type='text' name='autor' class='form-control' /></td>
        </tr>
        <tr>
            <td>Contingut</td>
            <td><input type='text' name='contingut' class='form-control' /></td>
        </tr>
        <tr>
            <td>Temàtica</td>
            <td>
                <select class='form-control' name='tematica'>
                <option>Selecciona una temàtica...</option>
                <?php foreach ($tematicas as $tematica) {
                echo "<option value='$tematica->id'>$tematica->nom</option>";
                }
                ?>
                </select>
            </td>
        </tr>
    

        <tr>
            <td>Imatge</td>
            <td><input type="file" name="imatge" /></td>
            </tr>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
    </table>
</form>