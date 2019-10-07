<?php

class DataHandler
{
    private $host;
    private $dbdriver;
    private $dbname;
    private $username;
    private $password;

    public function __construct($host, $dbdriver, $dbname, $username, $password)
    {
        $this->host = $host;
        $this->dbdriver = $dbdriver;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        try {
            $this->dbh = new PDO("$this->dbdriver:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            echo "Connection with " . $this->dbdriver . " failed: " . $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->dbh = null;
    }

    public function getData($sql)
    {
        $result = $this->dbh->query($sql, PDO::FETCH_ASSOC);
        return $result;
    }

    public function getPreparedQueryData($email, $wachtwoord){
        $stmt = $this->dbh->prepare("SELECT * from users where email = :email or username = :email    and wachtwoord = :wachtwoord");
        $stmt->execute([
            'email' => $email,
            'wachtwoord' => $wachtwoord
        ]);

        $result = $stmt->fetchAll();

        return $result;
    }

    public function updatePreparedQueryData($paginaID ,$mytextarea){
        $stmt = $this->dbh->prepare("UPDATE contentmanagement set content = :content where paginaID = :paginaID");
        $result = $stmt->execute([
            'content' => $mytextarea,
            'paginaID' => $paginaID
        ]);

        return $result;
    }

    public function addPreparedQueryData($paginatitel, $mytextarea){
        //check rol to see who to assign as the owner of the page
        if(isset($_SESSION['rol'])) {
            switch($_SESSION['rol']){
                case "0":
                    $owner = "beheer";
                    break;
                case "1":
                    $owner = "bioscoop";
                    break;
            }
        }
        //insert into the database table contentmangement
        $stmt = $this->dbh->prepare("INSERT INTO `contentmanagement`(owner, pagina, content) VALUES(:owner, :pagina, :content)");
        var_dump($stmt);
        $result = $stmt->execute([
            'owner' => $owner,
            'pagina' => $paginatitel,
            'content' => $mytextarea
        ]);

        return $result;
    }

    public function updateBioscoopData($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $aantal_zalen){
        $stmt = $this->dbh->prepare("UPDATE bioscopen set biosnaam = :biosnaam, biosadres = :biosadres, biospostcode = :biospostcode, biosplaats = :biosplaats, biosprovincie = :biosprovincie, aantal_zalen = :aantal_zalen
 where biosID = :biosID");
        var_dump($stmt);
        $result = $stmt->execute([
            'biosnaam' => $biosnaam,
            'biosadres' => $biosadres,
            'biospostcode' => $biospostcode,
            'biosplaats' => $biosplaats,
            'biosprovincie' => $biosprovincie,
            'aantal_zalen' => $aantal_zalen,
            'biosID' => $biosID
        ]);

        return $result;
    }

}
