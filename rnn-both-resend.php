<?php





$phpGo1 = escapeshellarg(($_POST['go1'] |= "")? $_POST['go1'] : "save-new5");
  

$phpGo2 = escapeshellarg(($_POST['go2'] |= "")? $_POST['go2'] : "500");

$phpGo3 = escapeshellarg(($_POST['go3'] |= "")? $_POST['go3'] : "'");

$phpGo4 = escapeshellarg(($_POST['go4'] |= "")? $_POST['go4'] : "1");

?>


<body onload="{

  document.getElementById('myGo').click()
  document.getElementById('myPlayIt').click()

}">

<h1 align=center> Machine Learning Music Serve by Jeremy Ellis @rocksetta </h1>






<form action="rnn-both-resend01.php" method="POST">
    
    
Choose an RNN  <select name="go1" >
     <option value="<?php echo ($_POST['go1'] |= "")? $_POST['go1'] : "jazzomat" ?>"><?php echo ($_POST['go1'] |= "")? $_POST['go1'] : "jazzomat" ?> </option>
     <option value="save-new4">save-new4 latest keyfreemusic sequence only 6</option>
     <option value="anthems">raw National Anthems test attempt</option>
     <option value="anthem-big">National Anthems merged with Rocksetta</option>
     <option value="anthem-small">National Anthems merged with Rocksetta using small RNN</option>
     <option value="jazzomat">Jazz greats RNN</option>
 </select>
    
 <font color=red>-n </font> <input size=5 type=text name="go2" value="<?php echo ($_POST['go2'] |= "")? $_POST['go2'] : "10" ?>">
    
 --prime  <input type=text id="myPrime" name="go3" value="<?php echo ($_POST['go3'] |= "")? $_POST['go3'] : "9" ?>">
    
 --sample  <select name="go4" >
     <option value="<?php echo ($_POST['go4'] |= "")? $_POST['go4'] : "1" ?>"><?php echo ($_POST['go4'] |= "")? $_POST['go4'] : "1" ?> </option>
     <option value=0>0</option>
     <option value=1>1</option>
     <option value=2>2</option>
 </select>
    
  <input id="mySubmitThis" type="submit">
    

</form> 
After clicking submit it will take a while as it will do all the calculations. On my computer 
it took about 10 seconds.<br>
See <a href="http://www.keyfreemusic.com">www.keyfreemusic.com</a> or
<a href="http://www.rocksetta.com">www.rocksetta.com</a> for some explanation.<br><br>




<?php
     


     

echo "command sent:  python sample-tinyshakespeare.1.py --save_dir $phpGo1 -n $phpGo2 --prime $phpGo3 --sample $phpGo4<br><br><hr><br>";

     
$output = shell_exec("python sample-tinyshakespeare.1.py --save_dir ".$phpGo1." -n ".$phpGo2." --prime ".$phpGo3." --sample ".$phpGo4);
//$output = passthru("python sample-tinyshakespeare.1.py");
     

     


// the following attempts to insert <br> line breaks don't work

//$output = preg_replace('#(\r\n?|\n)#', '<br>$1', shell_exec("python sample-tinyshakespeare.1.py --save_dir ".$phpGo1." -n ".$phpGo2." --prime ".$phpGo3." --sample ".$phpGo4));
//$output = preg_replace('#(\r\n?|\n)#', '<br>$1', proc_open("python sample-tinyshakespeare.1.py --save_dir ".$phpGo1." -n ".$phpGo2." --prime ".$phpGo3." --sample ".$phpGo4));

     //nl2br(exec("python test2.py ".$phpGo1." ".$phpGo2." ".$phpGo3." ".$phpGo4));
     
//echo preg_replace("/\r\n\r\n|\r\r|\n\n", "<br />",  $output);



//echo $output;

?>












 
    
    
<script>

function myPlay(volume) {
    
   frequency =  document.myNotes[1][document.myCounter2]
   mydura = document.myNotes[2][document.myCounter2]
    
  var context = new AudioContext;
  var gainNode = context.createGain();
  
  oscillator = context.createOscillator();
  oscillator.connect(gainNode);
  oscillator.type = 'sine'; //sine square sawtooth triangle custom
  
  gainNode.connect(context.destination);
  gainNode.gain.value = volume; //volume 1 = max
  gainNode.connect(context.destination);
        
  gainNode.gain.setValueAtTime(0, context.currentTime);
  gainNode.gain.linearRampToValueAtTime(1, context.currentTime + 30 / 1000); //attack
  gainNode.gain.linearRampToValueAtTime(0, context.currentTime + (mydura-30) / 1000); //decay

  oscillator.frequency.value = frequency;
  document.all.myArea04.value = context.currentTime + ' freq '+frequency+ ', '+mydura +
  '\n'+document.all.myArea04.value
  oscillator.start(0);

    setTimeout(function() {
        oscillator.stop(0);
        oscillator.disconnect(gainNode);
        gainNode.disconnect(context.destination);
        context.close();
    }, mydura)
  
    document.myCounter2 +=1
    if(document.myCounter2 <= document.myNotes[1].length-1){
        if (document.myKeepGoing){
            setTimeout('myPlay(1.0)', mydura)
        }
    }

}


   
 
   
   
 
   
 function myPlay2(volume) {
    
   frequency2 =  document.myNotes[1][document.myCounter22] * 0.7491
   mydura = document.myNotes[2][document.myCounter22]
    
  var context2 = new AudioContext;
  var gainNode2 = context2.createGain();
  
  oscillator2 = context2.createOscillator();
  oscillator2.connect(gainNode2);
  oscillator2.type = 'sine'; //sine square sawtooth triangle custom
  
  gainNode2.connect(context2.destination);
  gainNode2.gain.value = volume; //volume 1 = max
  gainNode2.connect(context2.destination);
        
  gainNode2.gain.setValueAtTime(0, context2.currentTime);
  gainNode2.gain.linearRampToValueAtTime(1, context2.currentTime + 30 / 1000); //attack
  gainNode2.gain.linearRampToValueAtTime(0, context2.currentTime + (mydura-30) / 1000); //decay

  oscillator2.frequency.value = frequency2;
  document.all.myArea04.value = context2.currentTime + ' freq '+frequency2+ ', '+mydura +
  '\n'+document.all.myArea04.value
  oscillator2.start(0);

    setTimeout(function() {
        oscillator2.stop(0);
        oscillator2.disconnect(gainNode2);
        gainNode2.disconnect(context2.destination);
        context2.close();
    }, mydura)
  
    document.myCounter22 +=1
    if(document.myCounter22 <= document.myNotes[1].length-1){
        if (document.myKeepGoing){
            setTimeout('myPlay2(1.0)', mydura)
        }
    }

}


       
   
 
   
 function myPlay3(volume) {
    
   frequency3 =  document.myNotes[1][document.myCounter23] * 0.63
   mydura = document.myNotes[2][document.myCounter23]
    
  var context3 = new AudioContext;
  var gainNode3 = context3.createGain();
  
  oscillator3 = context3.createOscillator();
  oscillator3.connect(gainNode3);
  oscillator3.type = 'sine'; //sine square sawtooth triangle custom
  
  gainNode3.connect(context3.destination);
  gainNode3.gain.value = volume; //volume 1 = max
  gainNode3.connect(context3.destination);
        
  gainNode3.gain.setValueAtTime(0, context3.currentTime);
  gainNode3.gain.linearRampToValueAtTime(1, context3.currentTime + 30 / 1000); //attack
  gainNode3.gain.linearRampToValueAtTime(0, context3.currentTime + (mydura-30) / 1000); //decay

  oscillator3.frequency.value = frequency3;
  document.all.myArea04.value = context3.currentTime + ' freq '+frequency3+ ', '+mydura +
  '\n'+document.all.myArea04.value
  oscillator3.start(0);

    setTimeout(function() {
        oscillator3.stop(0);
        oscillator3.disconnect(gainNode3);
        gainNode3.disconnect(context3.destination);
        context3.close();
    }, mydura)
  
    document.myCounter23 +=1
    if(document.myCounter23 <= document.myNotes[1].length-1){
        if (document.myKeepGoing){
            setTimeout('myPlay3(1.0)', mydura)
        }
    }

}


       
     
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   

    document.myKeepGoing = true;
    document.myBaseDuration = 250;  // milliseconds for one note

    document.myNotes = new Array(4)
    document.myNotes[0] = new Array()   // note number
    document.myNotes[1] = new Array()   // note frequency
    document.myNotes[2] = new Array()   // note duration
    document.myNotes[3] = new Array()   // note Octave
    //document.myNotes[4] = new Array()   // actual duration
    document.myCounter = -1;
    document.myCounter2 = 0;
    document.myCounter22 = 0;
    document.myCounter23 = 0;
    
    
</script>








<input type=button  value="Convert" id="myGo" onclick="{
document.all.myArea02.value = ''
document.myCounter = -1;
myIn = document.getElementById('myArea01')
myOctave = 4
myDuration = 1
for (myCount=0; myCount<= myIn.value.length-1; myCount++){
  if (myIn.value[myCount]== ','){myOctave -= 1; myDuration = 1}
   else if (myIn.value[myCount]== '\''){myOctave += 1; myDuration = 1}
      else if (myIn.value[myCount]== '_'){
              myDuration += 1;
              document.myNotes[2][document.myCounter] = myDuration
           }
           else if (myIn.value[myCount]== ' '){} // do nothing
           else {
             myDuration = 1
             document.myCounter += 1;
             document.myNotes[0][document.myCounter] = myIn.value[myCount]
             document.myNotes[1][document.myCounter] = -1
             document.myNotes[2][document.myCounter] = myDuration
             document.myNotes[3][document.myCounter] = myOctave
             //document.myNotes[4][document.myCounter] = document.myNotes[2][document.myCounter] * document.myBaseDuration 
             myOctave = 4
             myDuration = 1
             
           }
     
  
  
    
  }  // end for
  //alert(document.myNotes[0])
  //alert(document.myNotes[1])
  //alert(document.myNotes[2])
  //alert(document.myNotes[3])
  
  //alert(document.myNotes[3].length)
  document.all.myArea02.value = 'Count, Code, Freq, Duration, Octave \n'
  for (myGo=0; myGo<= document.myNotes[1].length-1; myGo++ ){
     document.all.myArea02.value += myGo + ' '+  document.myNotes[0][myGo] + ' ' +
     document.myNotes[1][myGo] + ' ' +
     document.myNotes[2][myGo] + ' ' +
     document.myNotes[3][myGo] + ' ' + '\n'
     //document.myNotes[4][myGo] + '\n'
  }
  
  
 
  for (myGo=0; myGo<= document.myNotes[1].length-1; myGo++ ){
  
   document.myNotes[2][myGo] = document.myNotes[2][myGo] * document.myBaseDuration  // set duration
   
   if (document.myNotes[0][myGo] == '-'){document.myNotes[1][myGo] = 0}   // set spaces
   
   
   
   if (document.myNotes[0][myGo] == '0'){document.myNotes[1][myGo] = 261.63}
   if (document.myNotes[0][myGo] == '1'){document.myNotes[1][myGo] = 277.18}
   if (document.myNotes[0][myGo] == '2'){document.myNotes[1][myGo] = 293.66}
   if (document.myNotes[0][myGo] == '3'){document.myNotes[1][myGo] = 311.13}
   if (document.myNotes[0][myGo] == '4'){document.myNotes[1][myGo] = 329.63}
   if (document.myNotes[0][myGo] == '5'){document.myNotes[1][myGo] = 349.23}
   if (document.myNotes[0][myGo] == '6'){document.myNotes[1][myGo] = 369.99}
   if (document.myNotes[0][myGo] == '7'){document.myNotes[1][myGo] = 392.00}
   if (document.myNotes[0][myGo] == '8'){document.myNotes[1][myGo] = 415.30}
   if (document.myNotes[0][myGo] == '9'){document.myNotes[1][myGo] = 440.00}
   if (document.myNotes[0][myGo] == '@'){document.myNotes[1][myGo] = 466.16}
   if (document.myNotes[0][myGo] == '*'){document.myNotes[1][myGo] = 493.88}
   
  
     if (document.myNotes[3][myGo] == 1){   // less than the middle octave
       document.myNotes[1][myGo] = document.myNotes[1][myGo] / 8
     } 
     
     if (document.myNotes[3][myGo] == 2){   // less than the middle octave
       document.myNotes[1][myGo] = document.myNotes[1][myGo] / 4
     }  
     
     if (document.myNotes[3][myGo] == 3){   // less than the middle octave
       document.myNotes[1][myGo] = document.myNotes[1][myGo] / 2
     }  
     
     if (document.myNotes[3][myGo] == 5){   // greater than the middle octave
       document.myNotes[1][myGo] = document.myNotes[1][myGo] * 2
     }  
     
     if (document.myNotes[3][myGo] == 6){   // greater  than the middle octave
       document.myNotes[1][myGo] = document.myNotes[1][myGo] * 4
     }  
     
     if (document.myNotes[3][myGo] == 7){   // greater  than the middle octave
       document.myNotes[1][myGo] = document.myNotes[1][myGo] * 8
     }  
                   

 
 
 
 } //end for
 
  
  
  document.all.myArea03.value = ''
   for (myGo=0; myGo<= document.myNotes[1].length-1; myGo++ ){
     document.all.myArea03.value += myGo + ' '+  
     document.myNotes[0][myGo] + ' ' +
     document.myNotes[1][myGo] + ' ' +
     document.myNotes[2][myGo] + ' ' +
     document.myNotes[3][myGo] + ' ' + '\n'
    // document.myNotes[4][myGo] + '\n'
  }
  
  
  
   
  
  
}">


<input id="myPlayIt" type=button value="Play Single Notes" onclick="{

 document.myKeepGoing = true;
 document.myCounter2 = 0;
 //document.all.myGo.click()
 
//alert(document.myNotes[1].length)


  myPlay(1.0);  // volume  // recursive function

}">

<input type=hidden value="Play Chords" onclick="{

 document.myKeepGoing = true;
//document.all.myGo.click()
 document.myCounter2 = 0;
 document.myCounter22 = 0;
 document.myCounter23 = 0;
 
 
  myPlay(1.0);  // volume  // recursive function
  
  myPlay2(1.0); 
  myPlay3(1.0); 
}">

<input type=button value="Stop" onclick="{

   document.myKeepGoing = false;
        
        
        

}">

<br><br>


Change Key <input style="font-size:35px" type=button value="+" onclick="{
  for (myGo=0; myGo<= document.myNotes[1].length-1; myGo++ ){
     document.myNotes[1][myGo] = document.myNotes[1][myGo] * 1.05946309436
  }
}">

<input type=button style="font-size:35px" value="-" onclick="{
  for (myGo=0; myGo<= document.myNotes[1].length-1; myGo++ ){
     document.myNotes[1][myGo] = document.myNotes[1][myGo] / 1.05946309436
  }
}"><br>



Edit playback note duration<input type="range" style="width:50%" id="mySlider" min="40" max="1000" step="1" value="100"  onchange="{
  document.myBaseDuration = this.value
  document.all.mySpeed.value = this.value
  document.all.myGo.click()
}"><input type=text id="mySpeed" value=100 size=5 onchange="{
   document.myBaseDuration = this.value
     document.all.myGo.click()
}"> milliseconds<br>

<h3>Key:</h3>
<b>,  =lower octave &nbsp;&nbsp; ' = higher octave, &nbsp;&nbsp;  - = no sound, &nbsp;&nbsp;  _ = continue note <br><br>


0 = root note (lets say C) &nbsp;&nbsp; 0=C  &nbsp;&nbsp; 1 = C# &nbsp;&nbsp; 2 = D &nbsp;&nbsp; 3 = D# &nbsp;&nbsp; 4 = E &nbsp;&nbsp; 5 = F &nbsp;&nbsp; 
6 = F# &nbsp;&nbsp; 7 = G &nbsp;&nbsp; 8 = G# &nbsp;&nbsp; 9 = A &nbsp;&nbsp; @ = A# &nbsp;&nbsp; * = B &nbsp;&nbsp; '0 = Higher C  </b><br> 

</b>















<br>



<input type=button style="font-size:25px; color:red" value="Resend" onclick="{

   document.all.myPrime.value = document.all.myArea01.value
   document.getElementById('mySubmitThis').click()


}">    <font color=red>Edit the box below using the "key" above and click "Resend" try -n = 1 for only one note at a time </font>  <br><br>


<textarea id="myArea01" rows=20 cols=50><?php echo ($output |= "")? $output : "04_7" ?></textarea>
<textarea id="myArea02" rows=20 cols=50></textarea>



<br>
<textarea id="myArea03" rows=20 cols=50></textarea>
<textarea id="myArea04" rows=20 cols=50></textarea>


<br>
Uselful links at <br>
<a href="http://www.rocksetta.com">Rocksetta.com</a><br>
<a href="http://www.keyfreemusic.com">Keyfreemusic.com</a><br>
<a href="http://rocksetta.com/support/convert-key-to-abc.html">Convert this to rocksetta input</a>
Github at <a href="https://github.com/hpssjellis/char-rnn-tensorflow-music-3dprinting">https://github.com/hpssjellis/char-rnn-tensorflow-music-3dprinting</a>


</body>







