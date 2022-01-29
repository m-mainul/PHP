<?php

abstract class Animal
{
    private $species;

    public function getSpecies()
    {
        return $this->species;
    }

    public function setSpecies($aSpecies)
    {
        $this->species = $aSpecies;
    }

}

abstract class Cat extends Animal
{
    private $breed;

    public function getBreed()
    {
        return $this->breed;
    }

    public function setBreed($aBreed)
    {
        $this->breed = $aBreed;
    }

}

class MyCat extends Cat
{
    private $catName;

   function  __construct($aSpecies,$aBreed,$aCatName)
   {
       $this->setSpecies($aSpecies);
       $this->setBreed($aBreed);
       $this->setCatName($aCatName);
   }

    public function getCatName()
    {
        return $this->catName;
    }

    public function setCatName($aCatName)
    {
        $this->catName = $aCatName;
    }

    public function showCat()
    {
        $mySpecies = $this->getSpecies();
        $myBreed = $this->getBreed();

        print "<p>My $mySpecies is a $myBreed named $this->catName</p>";

        echo "<p>My   $mySpecies is a $myBreed named $this->catName</p>";
    }
}

$myCat = new MyCat("Cat","Spaniel","Pinky");

$myCat->showCat();