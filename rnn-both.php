<?php

$phpGo1 =  escapeshellarg($_POST['go1']);
     
$phpGo2 = escapeshellarg($_POST['go2']);
     
$phpGo3 = escapeshellarg($_POST['go3']);
     
$phpGo4 = escapeshellarg($_POST['go4']);

?>

<h1 align=center> Machine-serve by Jeremy Ellis </h1>
Enter training data use 1's or 0's only<br>

<form action="rnn-both.php" method="POST">
    
    
 --save_dir  <input type=text name="go1" value="<?php if (isset($_POST['go1'])) echo $_POST['go1']; else echo "save-tinyshakespeare"; ?>">
    
 -n  <input type=text name="go2" value="<?php if (isset($_POST['go2'])) echo $_POST['go2']; else echo "500"; ?>">
    
 --prime  <input type=text name="go3" value="<?php if (isset($_POST['go3'])) echo $_POST['go3']; else echo "FRED:"; ?>">
    
 --sample  <input type=text name="go4" value="<?php if (isset($_POST['go4'])) echo $_POST['go4']; else echo "1"; ?>">
    
  <input type="submit">
    

</form> 
After clicking submit it will take a while as it will do all the calculations. On my computer 
it took about 10 seconds.




<?php
     


     
echo "<br><br>Results from sample-tinyshakespeare.py...<br>";
echo "sent:  python sample-tinyshakespeare.1.py --save_dir $phpGo1 -n $phpGo2 --prime $phpGo3 --sample $phpGo4<br><hr><br>";

     
//$output = shell_exec("python sample-tinyshakespeare.1.py --save_dir ".$phpGo1." -n ".$phpGo2." --prime ".$phpGo3." --sample ".$phpGo4);
//$output = passthru("python sample-tinyshakespeare.1.py");
     

     


// the following attempts to insert <br> line breaks don't work

$output = preg_replace('#(\r\n?|\n)#', '<br>$1', shell_exec("python sample-tinyshakespeare.1.py --save_dir ".$phpGo1." -n ".$phpGo2." --prime ".$phpGo3." --sample ".$phpGo4));

     //nl2br(exec("python test2.py ".$phpGo1." ".$phpGo2." ".$phpGo3." ".$phpGo4));
     
//echo preg_replace("/\r\n\r\n|\r\r|\n\n", "<br />",  $output);



echo $output;

?>



