<?php
class PostsController
{
    public function index()
    {
        // Guardamos todos los posts en una variable
        $posts = Post::all();
        require_once 'views/posts/index.php';
    }
    public function show()
    {
        // esperamos una url del tipo ?controller=posts&action=show&id=x
        // si no nos pasan el id redirecionamos hacia la pagina de error, el id
        //tenemos que buscarlo en la BBDD
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        // utilizamos el id para obtener el post correspondiente
        $post = Post::find($_GET['id']);
        require_once 'views/posts/show.php';
    }
    public function create()
    {
        require_once 'views/posts/create.php';
    }
    public function doCreate()
    {
      
        Post::create($_POST['autor'], $_POST['contingut'], $_POST['titol'], $_POST['imatge']);
        Post::uploadPhoto();
        require_once 'views/posts/create.php';
    }
    public function update()
    {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        $post = Post::find($_GET['id']);
        require_once 'views/posts/update.php';
    }
    public function doUpdate()
    {
        Post::update($_POST['id'], $_POST['autor'], $_POST['contingut'], $_POST['titol'], $_POST['imatge']);
        $posts = Post::all();
        return call('posts', 'index');
    }
    public function doDelete()
    {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        Post::delete($_GET['id']);
        return call('posts', 'index');
    }

}
