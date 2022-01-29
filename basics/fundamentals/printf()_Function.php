<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Understanding printf() Function.</title>
</head>
<body>

<!-- printf
(library)
The standard function in the C programming language library for 
printing formatted output.The first argument is a format string 
which may contain ordinary characters which are just printed and 
"conversion specifications" - sequences beginning with '%' such as 
%6d which describe how the other arguments should be printed, in 
this case as a six-character decimal integer padded on the right with spaces. -->

<p>Here is an example of using echo to output multiple options in a select box.</p>

<?php

        $options = array(
                        'option1' => 'title1',
                        'option2' => 'title2',
                        'option3' => 'title3',
                        'option4' => 'title4',
                        'option5' => 'title5'
                        );

        echo '<select>';

        foreach($options as $key => $val)
        {
            echo '<option value="'.$key.'">'.$val.'</option>';
        }

        echo '</select>';
?>

<br>
<br>
<br>
<br>

<p>This will create 5 image tags which will populate the a number of different attributes.</p>

<?php

        $options = array(
                        'image1' => array('class' => 'style', 'alt' => 'Image 1', 'title' => 'Image 1', 'width' => '100', 'height' => '100', 'src' => 'http://www.example.com/image1.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 2', 'title' => 'Image 2', 'width' => '200', 'height' => '200', 'src' => 'http://www.example.com/image2.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 3', 'title' => 'Image 3', 'width' => '300', 'height' => '300', 'src' => 'http://www.example.com/image3.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 4', 'title' => 'Image 4', 'width' => '400', 'height' => '400', 'src' => 'http://www.example.com/image4.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 5', 'title' => 'Image 5', 'width' => '500', 'height' => '500', 'src' => 'http://www.example.com/image5.jpg'),
                        );

        foreach($options as $key => $val)
        {
            echo '<img class="'.$val["class"].'" alt="'.$val["alt"].'" title="'.$val["title"].'" width="'.$val["width"].'" height="'.$val["height"].'" src="'.$val["src"].'" />';
        }
    ?>


 <br>
 <br>
 <br>

<p>Sprintf() Function Displaying Image Tag</p>

 <?php

        $options = array(
                        'image1' => array('class' => 'style', 'alt' => 'Image 1', 'title' => 'Image 1', 'width' => '100', 'height' => '100', 'src' => 'http://www.example.com/image1.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 2', 'title' => 'Image 2', 'width' => '200', 'height' => '200', 'src' => 'http://www.example.com/image2.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 3', 'title' => 'Image 3', 'width' => '300', 'height' => '300', 'src' => 'http://www.example.com/image3.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 4', 'title' => 'Image 4', 'width' => '400', 'height' => '400', 'src' => 'http://www.example.com/image4.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 5', 'title' => 'Image 5', 'width' => '500', 'height' => '500', 'src' => 'http://www.example.com/image5.jpg'),
                        );

        foreach($options as $key => $val)
        {
            $image = sprintf('<img class="%s" alt="%s" title="%s" width="%s" height="%s" src="%s" />',
                    $val["class"],
                    $val["alt"],
                    $val["title"],
                    $val["width"],
                    $val["height"],
                    $val["src"]);

            echo $image;
        }
    ?>


    <br>
    <br>

<p>Printf() Function Displaying Image Tag</p>

<?php

        $options = array(
                        'image1' => array('class' => 'style', 'alt' => 'Image 1', 'title' => 'Image 1', 'width' => '100', 'height' => '100', 'src' => 'http://www.example.com/image1.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 2', 'title' => 'Image 2', 'width' => '200', 'height' => '200', 'src' => 'http://www.example.com/image2.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 3', 'title' => 'Image 3', 'width' => '300', 'height' => '300', 'src' => 'http://www.example.com/image3.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 4', 'title' => 'Image 4', 'width' => '400', 'height' => '400', 'src' => 'http://www.example.com/image4.jpg'),
                        'image1' => array('class' => 'style', 'alt' => 'Image 5', 'title' => 'Image 5', 'width' => '500', 'height' => '500', 'src' => 'http://www.example.com/image5.jpg'),
                        );

        foreach($options as $key => $val)
        {
            printf('<img class="%s" alt="%s" title="%s" width="%s" height="%s" src="%s" />',
                    $val["class"],
                    $val["alt"],
                    $val["title"],
                    $val["width"],
                    $val["height"],
                    $val["src"]);
        }
    ?>
</body>
</html>