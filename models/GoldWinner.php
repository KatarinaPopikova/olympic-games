<?php


class GoldWinner
{
    private int $id;
    private string $name;
    private string $surname;
    private int $winYear;
    private string $place;
    private string $type;
    private string $discipline;

    public function printHtmlTableRow(){
        return "<tr><td class='show-member' onclick=\"window.location = 'showMember.php?id=$this->id'\">$this->name</td><td>$this->surname</td><td>$this->winYear</td><td>$this->type</td><td>$this->place</td><td>$this->discipline</td></tr>";
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return int
     */
    public function getWinYear(): int
    {
        return $this->winYear;
    }

    /**
     * @param int $winYear
     */
    public function setWinYear(int $winYear): void
    {
        $this->winYear = $winYear;
    }

    /**
     * @return string
     */
    public function getPlace(): string
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace(string $place): void
    {
        $this->place = $place;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDiscipline(): string
    {
        return $this->discipline;
    }

    /**
     * @param string $discipline
     */
    public function setDiscipline(string $discipline): void
    {
        $this->discipline = $discipline;
    }



}