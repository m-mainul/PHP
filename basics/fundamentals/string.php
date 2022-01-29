<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Example of heredoc.</title>
</head>
<body>
	<?php 
	//heredoc that lets the programmer create multi-line strings without using quotations
	/*There are a few very important things to remember when using heredoc.

    Use <<< and some identifier that you choose to begin the heredoc. In this example we chose TEST as our identifier.
    Repeat the identifier followed by a semicolon to end the heredoc string creation. In this example that was TEST;
    The closing sequence TEST; must occur on a line by itself and cannot be indented!*/
    // Another thing to note is that when you output this multi-line string to a web page, 
    //it will not span multiple lines because we did not have any <br /> tags contained inside our string! 
    //Here is the output made from the code above.

	$my_string = <<<TEST
	Tizag.com <br/>
	Webmaster Tutorials
	Unlock your potential!
TEST;
	echo $my_string;
	?>
</body>
</html>