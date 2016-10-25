<?php
     
$phpGo1 =  escapeshellarg($_POST['go1']);
     
$phpGo2 = escapeshellarg($_POST['go2']);
     
$phpGo3 = escapeshellarg($_POST['go3']);
     
$phpGo4 = escapeshellarg($_POST['go4']);

     
echo "<br><br>Results from sample-tinyshakespeare.py...<br>";
echo "sent:  python sample-tinyshakespeare.1.py --save_dir $phpGo1 -n $phpGo2 --prime $phpGo3 --sample $phpGo4<br>";

     
$output = passthru("python sample-tinyshakespeare.1.py --save_dir ".$phpGo1." -n ".$phpGo2." --prime ".$phpGo3." --sample ".$phpGo4);
//$output = passthru("python sample-tinyshakespeare.1.py");
     
echo $output;
     


// the following attempts to insert <br> line breaks don't work

//$output = preg_replace('#(\r\n?|\n)#', '<br>$1', passthru("python keras-serve.py ".$phpGo1." ".$phpGo2." ".$phpGo3." ".$phpGo4));

     //nl2br(exec("python test2.py ".$phpGo1." ".$phpGo2." ".$phpGo3." ".$phpGo4));
     
//echo preg_replace("/\r\n\r\n|\r\r|\n\n", "<br />",  $output);
?>

