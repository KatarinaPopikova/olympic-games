<?php


class Top10Winners
{
    private int $id;
    private string $name;
    private string $surname;
    private int $gold;

    public function printHtmlTableRow(){
        return "<tr><td class='show-member' onclick=\"window.location = 'showMember.php?id=$this->id'\">$this->name</td><td>$this->surname</td><td>$this->gold</td> <td><img src='pictures/edit.svg' alt='edit' class='icon' width='20' height='20'  onclick=\"window.location = 'editMember.php?id=$this->id'\"></td><td><img src='pictures/trash.svg' alt='trash' class='icon'  width='20' height='20' onclick=\"window.location = 'delete.php?id=$this->id'\"></td></tr>";
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
    public function getGold(): int
    {
        return $this->gold;
    }

    /**
     * @param int $gold
     */
    public function setGold(int $gold): void
    {
        $this->gold = $gold;
    }





}