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

abstract class Dog extends Animal
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

class MyDog extends Dog
{
    private $dogName;

    function __construct($aSpecies,$aBreed,$aDogName)
    {
        $this->setSpecies($aSpecies);
        $this->setBreed($aBreed);
        $this->setDogName($aDogName);
    }

    public function getDogName()
    {
        return $this->$dogName;
    }

    public function setDogName($aDogName)
    {
        $this->dogName = $aDogName;
    }

    public function showDog()
    {
        $mySpecies = $this->getSpecies();
        $myBreed = $this->getBreed();

        print "<p>My $mySpecies is a $myBreed ";
        print "named $this->dogName </p>";
    }

    public function getSpecies()
    {
        $mySpecies = parent :: getSpecies();
        return "$mySpecies Species";
    }
}

$myDog = new MyDog("Dog","Spaniel","Wuf Wuf");

$myDog->showDog();