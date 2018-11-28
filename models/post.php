<?php
class Post
{
    // definimos tres atributos
    // los declaramos como públicos para acceder directamente $post->author
    public $id;
    public $author;
    public $content;
    public $title;
    public $modified;
    public $created;
    public $image;
    public $tematica;
    public function __construct($id, $author, $content, $title , $modified ,$created,$image,$tematica)
    {
        $this->id = $id;
        $this->author = $author;
        $this->content = $content;
        $this->title = $title;
        $this->modified = $modified;
        $this->created = $created;
        $this->image = $image;
        $this->tematica = $tematica;
    }
    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM posts');

        // creamos una lista de objectos post y recorremos la respuesta de la
        //consulta
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['author'], $post['content'], $post['titol'], $post['dataCreacio'], $post['dataModificacio'], $post['imatge'], $post['tematica']);
        }
        return $list;
    }
    public static function find($id)
    {
        $db = Db::getInstance();
        // nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
        // preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        return new Post($post['id'], $post['author'], $post['content'], $post['titol'], $post['dataCreacio'], $post['dataModificacio'], $post['imatge'], $post['tematica']);
    }
    public static function create($autor,$contingut,$titol,$tematica)
    {

        $foto=file_get_contents($_FILES["imatge"]["tmp_name"]);
        

        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO posts (id,author,content,titol,imatge,tematica) VALUES (NULL,:author,:contingut,:titol,:imatge,:tematica)');
        $req->execute(array('author' => $autor,'contingut' => $contingut,'titol' => $titol,'imatge' => $foto,'tematica' => $tematica));
       
    }
    public static function update($id,$autor,$contingut,$imatge,$titol,$tematica)
    {
        if(!empty($_FILES["imatge"]["tmp_name"]))
        $foto=file_get_contents($_FILES["imatge"]["tmp_name"]);
        else
        $foto=$imatge;
        $db = Db::getInstance();
        $req = $db->prepare('UPDATE posts SET author = :author, content = :content,titol =:titol,imatge=:imatge,dataModificacio=:dataModificacio,tematica=:tematica WHERE posts.id = :id');
        $req->execute(array('author' => $autor,'content' => $contingut,'id' => $id,'titol' => $titol,'imatge' => $foto,'dataModificacio' => date('Y-m-d H:i:s'),'tematica'=>$tematica));
    }
    public static function delete($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM posts WHERE posts.id = :id');
        $req->execute(array('id' => $id));
    }
  
}
