<?php

class Database
{
    private $host = "localhost/phpmyadmin";
    private $user = "admin";
    private $pass = "admin";
    private $table = "client";

    public static $pdo = null;

    public function __construct()
    {
        try {
            self::$pdo = new \PDO('mysql:charset=utf8;host=' . $this->host . ';dbname=' . $this->table, $this->user, $this->pass, [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_PERSISTENT => true,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ]);
            return self::$pdo;
        } catch (\PDOException $e) {
             die('Erreur lors de la connexion &agrave; la base de donn&eacute;es: ' . $e->getMessage());
            die();
        }
    }

    public static function connect()
    {
        return self::$pdo;
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
