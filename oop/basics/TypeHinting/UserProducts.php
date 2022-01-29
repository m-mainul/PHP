<?php 
include_once('FruitStore.php');
include_once('CitrusStore.php');

class UserProducts
{
	public function __construct()
	{
		$appleSauce = new FruitStore();
		$orangeJuice = new CitrusStore();
		$this->doInterface($appleSauce);
		$this->doInterface($orangeJuice);
	}

	// IProduct is type in doInterface()

	function doInterface(IProduct $product)
	{
		echo $product->apples();
		echo $product->oranges();
	}
}

$worker = new UserProducts();