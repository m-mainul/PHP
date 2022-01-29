<?php 
    
    // Using __get and __set
    class MyClass {
        private $firstField;
        private $secondField;
        private $thirdField = "Hello World";

        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
            // Unable to access property; trigger error.
            // trigger_error('Undefined property via __get: ' . $property);
            // return NULL;
        }

        public function __set($property, $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

    $myClass = new MyClass();

    $myClass->firstField = "This is a foo line";
    $myClass->secondField = "This is a bar line";

    echo $myClass->firstField.'<br>';
    echo $myClass->secondField.'<br>';
    echo $myClass->thirdField.'<br>';
    echo $myClass->fourthField.'<br>';

    /* Output:
        This is a foo line
        This is a bar line
     */

    // Using Traditional Setters and Getters    
    class GenericClass {

        private $firstField;
        private $secondField;

        public function getFirstField() {
            return $this->firstField;
        }

        public function setFirstField($firstField) {
            $this->firstField = $firstField;
        }

        public function getSecondField() {
            return $this->secondField;
        }

        public function setSecondField($secondField) {
            $this->secondField = $secondField;
        }

    }

    $genericClass = new GenericClass();

    $genericClass->setFirstField("This is a foo line");
    $genericClass->setSecondField("This is a bar line");

    echo '<br>'.$genericClass->getFirstField();
    echo '<br>'.$genericClass->getSecondField();

    /* Output:
        This is a foo line
        This is a bar line
     */
    
 ?>