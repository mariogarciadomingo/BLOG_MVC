
<h2>Insertar Tematica<h2>
<form action="?controller=tematica&action=doCreate" method="post" enctype="multipart/form-data">
    <table class='table table-hover table-responsive table-bordered'>
    <tr>
            <td>Nom</td>
            <td><input type='text' name='nom' class='form-control' /></td>
        </tr>
        <tr>
            <td>Descripció</td>
            <td><input type='text' name='descripcio' class='form-control' /></td>
        </tr>
        <tr>
            <td>Interes</td>
            <td><input type='text' name='interes' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
    </table>
</form>