<?php
class Tematica
{
    public $id;
    public $nom;
    public $descripcio;
    public $dataCreacio;
    public $interes;

    public function __construct($id, $nom, $descripcio, $dataCreacio, $interes)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->descripcio = $descripcio;
        $this->dataCreacio = $dataCreacio;
        $this->interes = $interes;
    }
    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM tematica');

        // creamos una lista de objectos tematica y recorremos la respuesta de la
        //consulta
        foreach ($req->fetchAll() as $tematica) {
            $list[] = new Tematica($tematica['id'], $tematica['nom'], $tematica['descripcio'], $tematica['dataCreacio'], $tematica['interes']);
        }
        return $list;
    }
    public static function find($id)
    {
        $db = Db::getInstance();
        // nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM tematica WHERE id = :id');
        // preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        $tematica = $req->fetch();
        return new Tematica($tematica['id'], $tematica['nom'], $tematica['descripcio'], $tematica['dataCreacio'], $tematica['interes']);
    }
    public static function create($nom, $descripcio, $interes)
    {
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO tematica (id,nom,descripcio,interes,dataCreacio) VALUES (NULL,:nom,:descripcio,:interes,:dataCreacio)');
        $req->execute(array('nom' => $nom, 'descripcio' => $descripcio, 'interes' => $interes, 'dataCreacio' => date('Y-m-d H:i:s')));

    }
    public static function update($id, $nom, $descripcio, $interes)
    {
        $db = Db::getInstance();
        $req = $db->prepare('UPDATE tematica SET nom = :nom, descripcio = :descripcio,interes =:interes WHERE tematica.id = :id');
        $req->execute(array('id' => $id, 'nom' => $nom, 'descripcio' => $descripcio, 'interes' => $interes));
    }
    public static function delete($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM tematica WHERE tematica.id = :id');
        $req->execute(array('id' => $id));
    }
}
