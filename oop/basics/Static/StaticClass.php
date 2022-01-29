<!-- You can have static classes in PHP but they don't call the constructor automatically (if you try and call self::__construct() you'll get an error).
Therefore you'd have to create an initialize() function and call it in each method: -->

<?php

class Hello
{
    private static $greeting = 'Hello';
    private static $initialized = false;

    private static function initialize()
    {
    	if (self::$initialized)
    		return;

        self::$greeting .= ' There!';
    	self::$initialized = true;
    }

    public static function greet()
    {
    	self::initialize();
        echo self::$greeting;
    }
}

Hello::greet(); // Hello There!


?>





<?php 
	class StaticClass{
		public static $name = "Mainul Hasan";

		public static function my_name()
		{
			echo "Your name is ".self::$name."<br/>";
		}
	}

	StaticClass :: my_name();

	StaticClass :: $name = "Mehedi Hasan";

	StaticClass :: my_name();

	StaticClass :: $name = "Mahmududl Hasan";

	StaticClass :: my_name();

	$old_name = new StaticClass();
	$previous_name = new StaticClass();
	$previous_name :: $name = "Faruk Khan";
	$previous_name :: my_name();
	$present_name = new StaticClass();
	$future_name = new StaticClass();

 ?>