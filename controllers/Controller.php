<?php
require_once "helpers/Database.php";
require_once "models/GoldWinner.php";
require_once "models/Top10Winners.php";
require_once "models/Member.php";
require_once "models/Placement.php";

class Controller
{
    private $conn;

    /**
     * Controller constructor.
     * @param $conn
     */
    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConn();
    }

    public function getAllGoldWinners(){
        $stmt = $this->conn->prepare("SELECT OSOBY.id, OSOBY.name, OSOBY.surname, OH.year AS winYear, OH.city AS place, OH.type, UMIESTNENIA.discipline
                                        FROM UMIESTNENIA
                                        INNER JOIN OSOBY ON UMIESTNENIA.person_id = OSOBY.id
                                        INNER JOIN OH ON UMIESTNENIA.oh_id = OH.id
                                        WHERE UMIESTNENIA.placing = 1
                                        ORDER BY winYear DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "GoldWinner");
        return $stmt->fetchAll();
    }

    public function getTop10GoldWinners(){
        $stmt = $this->conn->prepare("SELECT OSOBY.id, OSOBY.name, OSOBY.surname, COUNT(UMIESTNENIA.placing) AS gold
                                        FROM UMIESTNENIA
                                        INNER JOIN OSOBY ON UMIESTNENIA.person_id = OSOBY.id
                                        WHERE UMIESTNENIA.placing = 1
                                        GROUP BY OSOBY.id
                                        ORDER BY gold DESC
                                        LIMIT 10");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Top10Winners");
        return $stmt->fetchAll();
    }

    public function getMember($id){
        $member = $this->getMemberInfo($id);
        $member->setPlacements($this->getPlacements($id));
        return $member;
    }

    public function getAllMembers(){

        $stmt = $this->conn->prepare("SELECT id, name, surname 
                                        FROM OSOBY
                                        ORDER BY surname");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
        return $stmt->fetchAll();

    }

    public function getMemberInfo($id){
        $stmt = $this->conn->prepare("SELECT OSOBY.id, OSOBY.name, OSOBY.surname, OSOBY.birth_day AS birthDay, OSOBY.birth_place AS birthPlace,
                                        OSOBY.birth_country AS birthCountry ,
                                        OSOBY.death_day AS deathDay, OSOBY.death_place as deathPlace, OSOBY.death_country AS deathCountry
                                      FROM OSOBY
                                      WHERE OSOBY.id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
        return $stmt->fetch();
    }

    public function getPlacements($id){

        $stmt = $this->conn->prepare("SELECT UMIESTNENIA.placing, UMIESTNENIA.discipline, OH.type, OH.year, OH.city, OH.country
                                        FROM UMIESTNENIA
                                        INNER JOIN OH ON UMIESTNENIA.oh_id = OH.id
                                        WHERE UMIESTNENIA.person_id = :id
                                        ORDER BY OH.year");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Placement");
        return $stmt->fetchAll();
    }

    public function getAllOH(){
            $stmt = $this->conn->prepare("SELECT id, type, year, city
                                        FROM OH
                                        ORDER BY year");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Placement");
            return $stmt->fetchAll();

    }

    public function deleteMember($id){
        $stmt = $this->conn->prepare("DELETE FROM OSOBY WHERE OSOBY.id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getEditMember($id, $name, $surname, $birthDay, $birthPlace, $birthCountry, $deathDay, $deathPlace, $deathCountry): int
    {
        $stmt = $this->conn->prepare("UPDATE OSOBY 
                                        SET OSOBY.name= :name,OSOBY.surname= :surname,OSOBY.birth_day= :birth_day,OSOBY.birth_place= :birth_place,OSOBY.birth_country= :birth_country,
                                        OSOBY.death_day= :death_day,OSOBY.death_place= :death_place,OSOBY.death_country= :death_country
                                         WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":surname", $surname, PDO::PARAM_STR);
        $stmt->bindValue(":birth_day", $birthDay, PDO::PARAM_STR);
        $stmt->bindValue(":birth_place", $birthPlace, PDO::PARAM_STR);
        $stmt->bindValue(":birth_country", $birthCountry, PDO::PARAM_STR);
        $stmt->bindValue(":death_day", $deathDay, PDO::PARAM_STR);
        $stmt->bindValue(":death_place", $deathPlace, PDO::PARAM_STR);
        $stmt->bindValue(":death_country", $deathCountry, PDO::PARAM_STR);

        try{
            $stmt->execute();
        }catch (PDOException $e){
            return -1;
        }
        return $stmt->rowCount();
    }

    public function addMember( $name, $surname, $birthDay, $birthPlace, $birthCountry, $deathDay, $deathPlace, $deathCountry): int
    {
        $stmt = $this->conn->prepare("INSERT INTO OSOBY (name, surname, birth_day, birth_place,birth_country,death_day,death_place,death_country )
                                        VALUES (:name, :surname, :birth_day,:birth_place,:birth_country,
                                        :death_day,:death_place,:death_country)");
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":surname", $surname, PDO::PARAM_STR);
        $stmt->bindValue(":birth_day", $birthDay, PDO::PARAM_STR);
        $stmt->bindValue(":birth_place", $birthPlace, PDO::PARAM_STR);
        $stmt->bindValue(":birth_country", $birthCountry, PDO::PARAM_STR);
        $stmt->bindValue(":death_day", $deathDay, PDO::PARAM_STR);
        $stmt->bindValue(":death_place", $deathPlace, PDO::PARAM_STR);
        $stmt->bindValue(":death_country", $deathCountry, PDO::PARAM_STR);

        try{
            $stmt->execute();
        }catch (PDOException $e){
            return -1;
        }
        return $stmt->rowCount();
    }


    public function addPlacement($addMember, $addOh,$placement,$discipline ): int
    {
        $stmt = $this->conn->prepare("INSERT INTO UMIESTNENIA (person_id, oh_id, placing, discipline)
                                        VALUES (:person_id, :oh_id, :placing,:discipline)");
        $stmt->bindValue(":person_id", $addMember, PDO::PARAM_INT);
        $stmt->bindValue(":oh_id", $addOh, PDO::PARAM_INT);
        $stmt->bindValue(":placing", $placement, PDO::PARAM_INT);
        $stmt->bindValue(":discipline", $discipline, PDO::PARAM_STR);

        try{
            $stmt->execute();
        }catch (PDOException $e){
            return -1;
        }
        return $stmt->rowCount();
    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param mixed $conn
     */
    public function setConn($conn): void
    {
        $this->conn = $conn;
    }



}