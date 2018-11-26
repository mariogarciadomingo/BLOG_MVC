<?php
class TematicaController
{
    public function index()
    {
        // Guardamos todos los tematica en una variable
        $tematicas = Tematica::all();
        require_once 'views/tematica/index.php';
    }
    public function show()
    {
        // esperamos una url del tipo ?controller=tematica&action=show&id=x
        // si no nos pasan el id redirecionamos hacia la pagina de error, el id
        //tenemos que buscarlo en la BBDD
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        // utilizamos el id para obtener el post correspondiente
        $tematica = Tematica::find($_GET['id']);
        require_once 'views/tematica/show.php';
    }
    public function create()
    {
        require_once 'views/tematica/create.php';
    }
    public function doCreate()
    {
        Tematica::create($_POST['nom'], $_POST['descripcio'], $_POST['interes']);
        require_once 'views/tematica/create.php';
    }
    public function update()
    {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        $tematica = Tematica::find($_GET['id']);
        require_once 'views/tematica/update.php';
    }
    public function doUpdate()
    {
        Tematica::update($_POST['id'], $_POST['nom'], $_POST['descripcio'], $_POST['interes']);
        $tematica = Tematica::all();
        return call('tematica', 'index');
    }
    public function doDelete()
    {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        Tematica::delete($_GET['id']);
        return call('tematica', 'index');
    }

}
