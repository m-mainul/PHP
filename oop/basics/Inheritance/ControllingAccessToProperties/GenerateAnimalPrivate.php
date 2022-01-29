<?php
/**
 * Created by PhpStorm.
 * User: Mainul Hasan
 * Date: 10/16/14
 * Time: 7:11 PM
 */
class Animal
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

class Dog extends Animal
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
        $mySpecies = $this->getSpecies();
        $myBreed = $this->getBreed();
        print "<p>My $mySpecies is a $myBreed";
        print " named $this->dogName </p>";
    }
}

$myDog = new MyDog("Dog","Spanielllll","Wuf Wuf");
$myDog->showDog();

//$myDog->setBreed("Collieeeeeeee");

//$myDog->showDog();


