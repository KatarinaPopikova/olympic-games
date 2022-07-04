<?php


class Member
{
    private int $id;
    private string $name;
    private string $surname;
    private string $birthDay;
    private string $birthPlace;
    private string $birthCountry;
    private ?string $deathDay;
    private ?string $deathPlace;
    private ?string $deathCountry;
    private array $placements;




    public function printInfoDetails(){
         $info = "<p> <b>*</b>   ".$this->birthDay.", ".$this->birthPlace.", ".$this->birthCountry."</p><br><p> <b>†</b>   ";
         $info.=($this->deathDay)?$this->deathDay.", " : "";
         $info.=($this->deathPlace)?$this->deathPlace.", " : "";
         $info.=($this->deathCountry)?$this->deathCountry.", " : "";
         $info.="</p>";
        return $info;
    }

    public function nameForOption(){
    return "<option value='".$this->id."'>".$this->surname." ".$this->name."</option>";
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
     * @return string
     */
    public function getBirthDay(): string
    {
        return $this->birthDay;
    }

    public function getBirthDayForInput(): string
    {
        $birthDayArray = explode(".",$this->birthDay);
        return $birthDayArray[2]."-".(strlen($birthDayArray[1]) === 1 ? "0".$birthDayArray[1] : $birthDayArray[1])."-".(strlen($birthDayArray[0]) === 1 ? "0".$birthDayArray[0] : $birthDayArray[0]);
    }

    public function getDayFromInput($inputDay): ?string
    {
        $dayArray = explode("-",$inputDay);
        $day= ltrim($dayArray[2],'0').".".ltrim($dayArray[1],'0').".".$dayArray[0];
        if( $day == "..")
            return null;
        return $day;
    }
    /**
     * @param string $birthDay
     */
    public function setBirthDay(string $birthDay): void
    {
        $this->birthDay = $birthDay;
    }


    /**
     * @return string
     */
    public function getBirthPlace(): string
    {
        return $this->birthPlace;
    }

    /**
     * @param string $birthPlace
     */
    public function setBirthPlace(string $birthPlace): void
    {
        $this->birthPlace = $birthPlace;
    }

    /**
     * @return string
     */
    public function getBirthCountry(): string
    {
        return $this->birthCountry;
    }

    /**
     * @param string $birthCountry
     */
    public function setBirthCountry(string $birthCountry): void
    {
        $this->birthCountry = $birthCountry;
    }

    /**
     * @return string|null
     */
    public function getDeathDay(): ?string
    {
        return $this->deathDay;
    }

    public function getDeathDayForInput(): string
    {
        $deathDayArray = explode(".",$this->deathDay);
        return $deathDayArray[2]."-".(strlen($deathDayArray[1]) === 1 ? "0".$deathDayArray[1] : $deathDayArray[1])."-".(strlen($deathDayArray[0]) === 1 ? "0".$deathDayArray[0] : $deathDayArray[0]);
    }

    /**
     * @param string|null $deathDay
     */
    public function setDeathDay(?string $deathDay): void
    {
        $this->deathDay = $deathDay;
    }

    /**
     * @return string|null
     */
    public function getDeathPlace(): ?string
    {
        return $this->deathPlace;
    }

    /**
     * @param string|null $deathPlace
     */
    public function setDeathPlace(?string $deathPlace): void
    {
        $this->deathPlace = $deathPlace;
    }

    /**
     * @return string|null
     */
    public function getDeathCountry(): ?string
    {
        return $this->deathCountry;
    }

    /**
     * @param string|null $deathCountry
     */
    public function setDeathCountry(?string $deathCountry): void
    {
        $this->deathCountry = $deathCountry;
    }

    /**
     * @return array
     */
    public function getPlacements(): array
    {
        return $this->placements;
    }

    /**
     * @param array $placements
     */
    public function setPlacements(array $placements): void
    {
        $this->placements = $placements;
    }



}