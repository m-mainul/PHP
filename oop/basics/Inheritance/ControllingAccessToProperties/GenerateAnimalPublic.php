<?php
/**
 * Created by PhpStorm.
 * User: Mainul Hasan
 * Date: 10/2/14
 * Time: 6:56 PM
 */

class Animal
{
    public $species;

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
    public $breed;

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
    public $dogName;

    function __construct($aSpecies,$aBreed,$aDogName)
    {
        $this->species = $aSpecies;
        $this->breed = $aBreed;
        $this->dogName= $aDogName;
    }

    public function showDog()
    {
        print "<p>My $this->species is a $this->breed";
        print " named $this->dogName </p>";
    }
}

$myDog = new MyDog("Dog","Spaniel","Wuf Wuf");
$myDog->showDog();

$myDog->setBreed("Collie");

$myDog->showDog();



