<?php

class Animal
{
    protected $species;

    public function getSpecies()
    {
        return $this->species;
    }

    public function setSpecies($aSpecies)
    {
        $this->species = $aSpecies;
    }
}

class Dog extends Animal
{
    protected $breed;

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
    private  $dogName;

    function __construct($aSpecies,$aBreed,$aDogName)
    {
        $this->setSpecies($aSpecies);
        $this->setBreed($aBreed);
        $this->setDogName($aDogName);
    }

    public function getDogName()
    {
        return $this->species;
    }

    public function setDogName($aDogName)
    {
        $this->dogName = $aDogName;
    }

    public function showDog()
    {
//        $mySpecies = $this->getSpecies();
//        $myBreed = $this->getBreed();
        print "<p>My $this->species is a $this->breed";
        print " named $this->dogName </p>";
    }
}

$myDog = new MyDog("Dog","Spanielllll","Wuf Wuf");
$myDog->showDog();

$myDog->setBreed("Collieeeeeeee");

$myDog->showDog();


