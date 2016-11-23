<?php





$phpGo1 = escapeshellarg(($_POST['go1'] |= "")? $_POST['go1'] : "save-tinyshakespeare");
  

$phpGo2 = escapeshellarg(($_POST['go2'] |= "")? $_POST['go2'] : "500");

$phpGo3 = escapeshellarg(($_POST['go3'] |= "")? $_POST['go3'] : "'");

$phpGo4 = escapeshellarg(($_POST['go4'] |= "")? $_POST['go4'] : "1");

?>

<h1 align=center> Machine-serve by Jeremy Ellis </h1>


<form action="rnn-both.php" method="POST">
    
    
 --save_dir  <select name="go1" >
     <option value="<?php echo ($_POST['go1'] |= "")? $_POST['go1'] : "save-tinyshakespeare" ?>"><?php echo ($_POST['go1'] |= "")? $_POST['go1'] : "save-tinyshakespeare" ?> </option>
     <option value="save-tinyshakespeare">save-tinyshakespeare</option>
     <option value="save-abc">save-abc</option>
     <option value="save-3d">save-3d</option>
     <option value="save-new">save-new</option>
     <option value="save-new2">save-new2</option>
     <option value="save-new4">save-new4 latest keyfreemusic sequence only 6</option>
     <option value="save-new5">save-new5 latest keyfreemusic sequence only 6</option>
 </select>
    
 -n  <input type=text name="go2" value="<?php echo ($_POST['go2'] |= "")? $_POST['go2'] : "500" ?>">
    
 --prime  <input type=text name="go3" value="<?php echo ($_POST['go3'] |= "")? $_POST['go3'] : "'" ?>">
    
 --sample  <select name="go4" >
     <option value="<?php echo ($_POST['go4'] |= "")? $_POST['go4'] : "1" ?>"><?php echo ($_POST['go4'] |= "")? $_POST['go4'] : "1" ?> </option>
     <option value=0>0</option>
     <option value=1>1</option>
     <option value=2>2</option>
 </select>
    
  <input type="submit">
    

</form> 
After clicking submit it will take a while as it will do all the calculations. On my computer 
it took about 10 seconds.<br>
See <a href="http://www.keyfreemusic.com">www.keyfreemusic.com</a> or
<a href="http://www.rocksetta.com">www.rocksetta.com</a> for some explanation.<br><br>




<?php
     


     

echo "command sent:  python sample-tinyshakespeare.1.py --save_dir $phpGo1 -n $phpGo2 --prime $phpGo3 --sample $phpGo4<br><br><hr><br>";

     
//$output = shell_exec("python sample-tinyshakespeare.1.py --save_dir ".$phpGo1." -n ".$phpGo2." --prime ".$phpGo3." --sample ".$phpGo4);
//$output = passthru("python sample-tinyshakespeare.1.py");
     

     


// the following attempts to insert <br> line breaks don't work

$output = preg_replace('#(\r\n?|\n)#', '<br>$1', shell_exec("python sample-tinyshakespeare.1.py --save_dir ".$phpGo1." -n ".$phpGo2." --prime ".$phpGo3." --sample ".$phpGo4));
//$output = preg_replace('#(\r\n?|\n)#', '<br>$1', proc_open("python sample-tinyshakespeare.1.py --save_dir ".$phpGo1." -n ".$phpGo2." --prime ".$phpGo3." --sample ".$phpGo4));

     //nl2br(exec("python test2.py ".$phpGo1." ".$phpGo2." ".$phpGo3." ".$phpGo4));
     
//echo preg_replace("/\r\n\r\n|\r\r|\n\n", "<br />",  $output);



echo $output;

?>



