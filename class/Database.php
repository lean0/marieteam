<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $table = "client";


    public static function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=marieteam', 'root', '');
        return $pdo;
    }

    public static function tabColonnesForTable($name) {
        $tabColonnes = Database::connect()->query("SHOW COLUMNS FROM ".$name);
        return $tabColonnes->fetchAll();
    }

    public static function updatePost($post, $nametable, $key, $where = "id")
    {
        $data = [];
        $datasql = '';

        $tabColonnes = self::tabColonnesForTable($nametable);

        for($i = 0; $i < count($tabColonnes); $i++) {
            if (isset($post[$tabColonnes[$i]['Field']])) {
                $datasql = $datasql . ($datasql != '' ? ', ' : '') . $tabColonnes[$i]['Field'] . " = ?";
                array_push($data, ($post[$tabColonnes[$i]['Field']]));
            }
        }
        array_push($data, $key);
        $req = Database::connect()->prepare("UPDATE ".$nametable." SET ".$datasql." WHERE ".$where." = ?");
        $req->execute($data);
    }

    public static function insertReplacePost($post, $nametable, $key, $where = "id")
    {
        $data = [];
        $datasql = '';
        $value = '';

        $tabColonnes = self::tabColonnesForTable($nametable);

        for($i = 0; $i < count($tabColonnes); $i++) {
            if (isset($post[$tabColonnes[$i]['Field']]) && !System::checkNull($post[$tabColonnes[$i]['Field']])) {
                $datasql = $datasql . ($datasql != '' ? ', ' : '') . $tabColonnes[$i]['Field'];
                $value = $value . ($value != '' ? ',' : '') .'?';
                array_push($data, ($post[$tabColonnes[$i]['Field']]));
            }
        }

        $req = Database::connect()->prepare("REPLACE INTO ".$nametable."  (".$datasql.") VALUE (".$value.")");
        $req->execute($data);
    }

    public static function insertPost($post, $nametable)
    {
        $data = [];
        $datasql = '';
        $value = '';

        $tabColonnes = self::tabColonnesForTable($nametable);

        for($i = 0; $i < count($tabColonnes); $i++) {
            if (isset($post[$tabColonnes[$i]['Field']]) && !System::checkNull($post[$tabColonnes[$i]['Field']])) {
                $datasql = $datasql . ($datasql != '' ? ', ' : '') . $tabColonnes[$i]['Field'];
                $value = $value . ($value != '' ? ',' : '') .'?';
                array_push($data, ($post[$tabColonnes[$i]['Field']]));
            }
        }

        $req = Database::connect()->prepare("INSERT INTO ".$nametable."  (".$datasql.") VALUE (".$value.")");
        $req->execute($data);
    }

    public static function checkRequiredPost($post, $writelist)
    {
        $reponse = true;
        foreach ($post as $cle => $value) {

            if (!in_array($cle, $writelist)) {
                if(System::checkNull($value)) {
                    $reponse = false;
                    break;
                }
            }
        }
        return $reponse;
    }

    public static function postCheckBoxEncode($post, $name, $nb)
    {
        $tab = [];
        for($i = 1; $i <= $nb; $i++) {
            if(isset($post[$name.$i])) {
                array_push($tab, $post[$name.$i]);
            }
        }

        return json_encode($tab);
    }

    public static function postCheckBoxDecode($tab, $name)
    {
        return (array) json_decode($tab[$name],true);
        /*for($i = 0; $i < count($json); $i++) {
            $tab[$name.$i+1] = $json[$i];
        }

        return $tab;*/
    }
}
