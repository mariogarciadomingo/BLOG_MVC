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
    public static function create($autor,$contingut,$titol,$imatge,$tematica)
    {
        $image = !empty($_FILES["image"]["name"])
        ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO posts (id,author,content,titol,imatge,tematica) VALUES (NULL,:author,:contingut,:titol,:imatge,:tematica)');
        $req->execute(array('author' => $autor,'contingut' => $contingut,'titol' => $titol,'imatge' => $image,'tematica' => $tematica));
       
    }
    public static function update($id,$autor,$contingut,$titol,$imatge,$tematica)
    {
        $db = Db::getInstance();
        $req = $db->prepare('UPDATE posts SET author = :author, content = :content,titol =:titol,imatge=:imatge,dataModificacio=:dataModificacio,tematica=:tematica WHERE posts.id = :id');
        $req->execute(array('author' => $autor,'content' => $contingut,'id' => $id,'titol' => $titol,'imatge' => $image,'dataModificacio' => date('Y-m-d H:i:s'),'tematica'=>$tematica));
    }
    public static function delete($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM posts WHERE posts.id = :id');
        $req->execute(array('id' => $id));
    }
    public static function uploadPhoto(){
 
        $result_message="";
     
        // now, if image is not empty, try to upload the image
        if($image){
     
            // sha1_file() function is used to make a unique file name
            $target_directory = "uploads/";
            $target_file = $target_directory . $image;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
     
            // error message is empty
            $file_upload_error_messages="";
     // make sure that file is a real image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check!==false){
        // submitted file is an image
    }else{
        $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
    }
     
    // make sure certain file types are allowed
    $allowed_file_types=array("jpg", "jpeg", "png", "gif");
    if(!in_array($file_type, $allowed_file_types)){
        $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
    }
     
    // make sure file does not exist
    if(file_exists($target_file)){
        $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
    }
     
    // make sure submitted file is not too large, can't be larger than 1 MB
    if($_FILES['image']['size'] > (1024000)){
        $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
    }
     
    // make sure the 'uploads' folder exists
    // if not, create it
    if(!is_dir($target_directory)){
        mkdir($target_directory, 0777, true);
    }
    // if $file_upload_error_messages is still empty
    if(empty($file_upload_error_messages)){
        // it means there are no errors, so try to upload the file
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            // it means photo was uploaded
        }else{
            $result_message.="<div class='alert alert-danger'>";
                $result_message.="<div>Unable to upload photo.</div>";
                $result_message.="<div>Update the record to upload photo.</div>";
            $result_message.="</div>";
        }
    }
     
    // if $file_upload_error_messages is NOT empty
    else{
        // it means there are some errors, so show them to user
        $result_message.="<div class='alert alert-danger'>";
            $result_message.="{$file_upload_error_messages}";
            $result_message.="<div>Update the record to upload photo.</div>";
        $result_message.="</div>";
    }
        }
     
        return $result_message;
    }
}
