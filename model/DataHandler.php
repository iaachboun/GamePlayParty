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
        $stmt = $this->dbh->prepare("SELECT * from users where email = :email or username = :email and wachtwoord = :wachtwoord");
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

    public function beheerUpdateGebruikerData($username, $email, $wachtwoord, $userID){
        $stmt = $this->dbh->prepare("UPDATE users set username = :username, email = :email, wachtwoord = :wachtwoord
 where userID = :userID");

        $result = $stmt->execute([
            'username' => $username,
            'email' => $email,
            'wachtwoord' => $wachtwoord,
            'userID' => $userID
        ]);

        return $result;
    }

    //bioscoop

    public function biosUpdatePreparedQueryData($paginaID ,$mytextarea){
        $stmt = $this->dbh->prepare("UPDATE contentmanagement set content = :content where paginaID = :paginaID");
        $result = $stmt->execute([
            'content' => $mytextarea,
            'paginaID' => $paginaID
        ]);

        return $result;
    }

    public function biosAddPreparedQueryData($paginatitel, $mytextarea){
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

        $result = $stmt->execute([
            'owner' => $owner,
            'pagina' => $paginatitel,
            'content' => $mytextarea
        ]);

        return $result;
    }

    public function biosUpdateBioscoopData($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $aantal_zalen){
        $stmt = $this->dbh->prepare("UPDATE bioscopen set biosnaam = :biosnaam, biosadres = :biosadres, biospostcode = :biospostcode, biosplaats = :biosplaats, biosprovincie = :biosprovincie, aantal_zalen = :aantal_zalen
 where biosID = :biosID");

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

    public function biosBeheerUpdateGebruikerData($username, $email, $wachtwoord, $userID){
        $stmt = $this->dbh->prepare("UPDATE users set username = :username, email = :email, wachtwoord = :wachtwoord
 where userID = :userID");

        $result = $stmt->execute([
            'username' => $username,
            'email' => $email,
            'wachtwoord' => $wachtwoord,
            'userID' => $userID
        ]);

        return $result;
    }

    public function addNewDienst($dienst, $tarief)
    {
        $stmt = $this->dbh->prepare("INSERT INTO diensten (dienst, tarief) VALUES (:dienst, :tarief)");
        $result = $stmt->execute([
            'dienst' => $dienst,
            'tarief' => $tarief,
        ]);
    }

    public function addNewBeschikbaarheid($biosID, $date, $begintijd, $eindtijd, $zaal, $console){
        $stmt = $this->dbh->prepare("INSERT INTO `reserveringen`(biosID, reserveringsdatum, reservering_begin_tijd, reservering_eind_tijd, zaal_id, console_id) VALUES(:biosID, :reserveringsdatum, :reservering_begin_tijd, :reservering_eind_tijd, :zaal_id, :console_id)");
        
        $result = $stmt->execute([
            'biosID' => $biosID,
            'reserveringsdatum' => $date,
            'reservering_begin_tijd' => $begintijd,
            'reservering_eind_tijd' => $eindtijd,
            'zaal_id' => $zaal,
            'console_id' => $console
        ]);

        return $result;
    }

}
