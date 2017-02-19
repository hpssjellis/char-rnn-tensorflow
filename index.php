<?php





$phpGo1 = escapeshellarg(($_POST['go1'] |= "")? $_POST['go1'] : "save-new5");
  

$phpGo2 = escapeshellarg(($_POST['go2'] |= "")? $_POST['go2'] : "500");

$phpGo3 = escapeshellarg(($_POST['go3'] |= "")? $_POST['go3'] : "'");

$phpGo4 = escapeshellarg(($_POST['go4'] |= "")? $_POST['go4'] : "1");

$phpmyAuto = escapeshellarg(($_POST['myCoolAuto'] |= "")? $_POST['myCoolAuto'] : "");

?>


<body onload="{

  document.getElementById('myCoolRange').value = document.getElementById('myCoolTempo').value
  document.getElementById('mySpeed').value = document.getElementById('myCoolTempo').value
  document.myBaseDuration = document.getElementById('myCoolTempo').value
  
  
if (! document.getElementById('myAutoPlay').checked){

  document.getElementById('myGo').click()
  document.getElementById('myPlayIt').click()
  }
  
  
  


 //alert(document.myBaseDuration)
}">

<h1 align=center> Machine Learning Play along RNN Music Serve by @rocksetta </h1>

You tube video at <a href="https://youtu.be/kqzBDt2-QI4">https://youtu.be/kqzBDt2-QI4</a><br><br>




<form action="index.php" method="POST">
    
    
Choose an RNN  <select name="go1" >
     <option value="<?php echo ($_POST['go1'] |= "")? $_POST['go1'] : "jazzomat" ?>"><?php echo ($_POST['go1'] |= "")? $_POST['go1'] : "jazzomat" ?> </option>
     <option value="save-new4">Rocksetta General</option>
     <option value="anthems">raw National Anthems test attempt</option>
     <option value="anthem-big">National Anthems merged with Rocksetta</option>
     <option value="anthem-small">National Anthems merged with Rocksetta using small RNN</option>
     <option value="jazzomat-small">Jazz greats RNN faster but not as good</option>
     <option value="jazzomat">Jazz greats RNN</option>
     <option value="beatles-short">Short Beatles Songs</option>
     <option value="beatles-200">Continuous Beatles</option>
     <option value="beatles-800">Overtrained Beatles Warning: may snap to a learnt song.</option>
     <option value="beatles-10300">Super Overtrained Beatles Warning: may snap to a learnt song.</option>
 </select>
    
 <font color=red>-n </font> <input size=5 type=text name="go2" value="<?php echo ($_POST['go2'] |= "")? $_POST['go2'] : "30" ?>">
    
 --prime  <input type=text id="myPrime" name="go3" value="<?php echo ($_POST['go3'] |= "")? $_POST['go3'] : "47'0_" ?>">
    

 
 <input name="go4" type=hidden value = "1">
    
  <input id="mySubmitThis" type="submit">

  
 <input name="myCoolAuto" type="checkbox" id="myAutoPlay" <?php echo ($_POST['myCoolAuto'] != "")?  "checked" : ""  ?> > Stop Auto Play   
 
 
  <input type="hidden" id="myCoolTempo" name="myTempo" value="<?php echo ($_POST['myTempo'] |= "")? $_POST['myTempo'] : "250" ?>">
 
 
 

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
  oscillator.type = 'triangle'; //sine square sawtooth triangle custom
  
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
        oscillator.stop(0);
        oscillator.disconnect(gainNode);
        gainNode.disconnect(context.destination);
        context.close();    
        

  
        clearInterval(document.myTimer);   // for piano


  

}">



<br><br>


Change Key <input style="font-size:35px" type=button value="+" onclick="{



 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/,\*/g,'F');  // convert ,* to F
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/\*/g,'G');   // convert * to G

 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/@/g,'*');
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/9/g,'@');
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/8/g,9);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/7/g,8);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/6/g,7);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/5/g,6);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/4/g,5);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/3/g,4);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/2/g,3);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/1/g,2);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/0/g,1);

 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/F/g,0);      // F now to 0
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/G/g,'\'0');  // G now to '0



}">

<input type=button style="font-size:35px" value="-" onclick="{





 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/'0/g,'F');  // convert ,* to F
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/0/g,'G');   // convert * to G

 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/1/g,0);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/2/g,1);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/3/g,2);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/4/g,3);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/5/g,4);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/6/g,5);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/7/g,6);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/8/g,7);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/9/g,8);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/\@/g,9);
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/\*/g,'@');

 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/F/g,'*');      // F now to 0
 document.getElementById('myArea01').value = document.getElementById('myArea01').value.replace(/G/g,',*');  // G now to '0








}"><br>



Edit playback note duration <input id="myCoolRange" type="range" style="width:50%" id="mySlider" min="40" max="1000" step="1" value="100"  onchange="{
  document.myBaseDuration = this.value
  document.all.mySpeed.value = this.value
  document.getElementById('myCoolTempo').value =  document.getElementById('myCoolRange').value
  
  document.all.myGo.click()
}"><input type=text id="mySpeed" value=100 size=5 onchange="{
      document.myBaseDuration = this.value
      document.all.myGo.click()
     
      document.getElementById('myCoolTempo').value =  document.getElementById('mySpeed').value
      document.getElementById('myCoolRange').value =  document.getElementById('mySpeed').value
}"> milliseconds<br>

<h3>Key:</h3>
<b>,  =lower octave &nbsp;&nbsp; ' = higher octave, &nbsp;&nbsp;  - = no sound, &nbsp;&nbsp;  _ = continue note <br><br>


0 = root note (lets say C) &nbsp;&nbsp; 0 = C  &nbsp;&nbsp; 1 = C# &nbsp;&nbsp; 2 = D &nbsp;&nbsp; 3 = D# &nbsp;&nbsp; 4 = E &nbsp;&nbsp; 5 = F &nbsp;&nbsp; 
6 = F# &nbsp;&nbsp; 7 = G &nbsp;&nbsp; 8 = G# &nbsp;&nbsp; 9 = A &nbsp;&nbsp; @ = A# &nbsp;&nbsp; * = B &nbsp;&nbsp; '0 = Higher C  </b><br> 

</b>















<br>



<input type=button style="font-size:25px; color:red" value="Resend" onclick="{

   document.all.myPrime.value = document.all.myArea01.value
   document.getElementById('mySubmitThis').click()


}">    <font color=red>Edit the box below using the "key" above and click "Resend" </font>  <br><br>







<br>





 
    
<script>
context = new Array()
gainNode = new Array()


function myStop8(myNum) {
   gainNode[myNum].gain.setTargetAtTime(0, context[myNum].currentTime, 0.020); //0.015

   setTimeout(function(){ // give the above line 300 ms to achive the damping of the sound
      gainNode[myNum].disconnect(context[myNum].destination);
      context[myNum].close();
   }, 50);

}



function myPlay8(frequency, myNum) {

  volume = 1.0   
  context[myNum] = new AudioContext;
  gainNode[myNum] = context[myNum].createGain();
  //gainNode[myNum].gain.setTargetAtTime(0, context[myNum].currentTime, 0.015);

  oscillator = context[myNum].createOscillator();
  oscillator.connect(gainNode[myNum]);
  oscillator.type = 'triangle'; //sine square sawtooth triangle custom
  
  gainNode[myNum].connect(context[myNum].destination);
  gainNode[myNum].gain.value = volume; //volume 1 = max
  gainNode[myNum].connect(context[myNum].destination);
        
  gainNode[myNum].gain.setValueAtTime(0, context[myNum].currentTime);
  gainNode[myNum].gain.linearRampToValueAtTime(1, context[myNum].currentTime + 10 / 1000); //attack
 // gainNode[myNum].gain.linearRampToValueAtTime(1, context[myNum].currentTime + 30 / 1000); //attack

  oscillator.frequency.value = frequency;
  oscillator.start(0);

}






document.myStop = 'fred';














function myAdd(){
   document.getElementById('myArea01').value += '_' 

}

function myRest(){

   document.getElementById('myArea01').value += '-' 
   
}








</script>




<input type=button value= Clear onclick="{
  
  document.getElementById('myArea01').value =''


//http://www.richardbrice.net/midi_notes.htm

}"><br><br>









<img id="my90" src="white-off.png" style="position:relative; top:0px; left:0px z-index:1;" ontouchstart="{
  this.src='white-on.png';  

  myPlay8(246.94, 59);     //B 3 	59 		246.94
  document.getElementById('myArea01').value += ',*';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='white-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500);  
      myStop8(59);   
      return false // to stop the button click
}"  onmousedown="{
  this.src='white-on.png';  

  myPlay8(246.94, 59);     //B 3 	59 		246.94
  document.getElementById('myArea01').value += ',*';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='white-off.png';
       clearInterval(document.myTimer);      
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(59);   
}"  >




<img id="my00" src="white-off.png" style="position:relative; top:0px; left:-8px; z-index:1;"  ontouchstart="{
  this.src='white-on.png';  

  myPlay8(261.63, 60);  // C 4 	60 		261.63* Middle-C
  document.getElementById('myArea01').value += '0';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='white-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500); 
      myStop8(60);   
      return false // to stop the button click
}"  onmousedown="{
  this.src='white-on.png';  

  myPlay8(261.63, 60);  // C 4 	60 		261.63* Middle-C
  document.getElementById('myArea01').value += '0';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='white-off.png';
       clearInterval(document.myTimer);
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(60);   
}"  >





<img id="my01" src="black-off.png" style="position:relative; top:-31px; left:-24px; z-index:3;"  ontouchstart="{
  this.src='black-on.png'; 


  myPlay8(277.18, 61);  // C# 4 	61 		277.18
  document.getElementById('myArea01').value += '1';   //****
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='black-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500); 
      myStop8(61);                                      //****
      return false // to stop the button click
}"  onmousedown="{
  this.src='black-on.png';  

  myPlay8(277.18, 61);  // C# 4 	61 		277.18
  document.getElementById('myArea01').value += '1';     //****
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='black-off.png';
       clearInterval(document.myTimer);
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(61);                                     //****
}"  >






<img id="my02" src="white-off.png"  style="position:relative; top:0px; left:-36px; z-index:1;"  ontouchstart="{
  this.src='white-on.png';   

  myPlay8(293.66, 62);     // D 4 	62 		293.66
  document.getElementById('myArea01').value += '2';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='white-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500);  
      myStop8(62);   
      return false // to stop the button click
}"  onmousedown="{
  this.src='white-on.png';  

  myPlay8(293.66, 62);     // D 4 	62 		293.66
  document.getElementById('myArea01').value += '2';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='white-off.png';
       clearInterval(document.myTimer);      
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(62);   
}"  >




<img id="my03" src="black-off.png"   style="position:relative; top:-31px; left:-51px; z-index:3;"  ontouchstart="{
  this.src='black-on.png';   

  myPlay8(311.13, 63 );  // D# 4 	63 		311.13
  document.getElementById('myArea01').value += '3';   //****
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='black-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500); 
      myStop8(63);                                      //****
      return false // to stop the button click
}"  onmousedown="{
  this.src='black-on.png';  

  myPlay8(311.13, 63 );  // D# 4 	63 		311.13
  document.getElementById('myArea01').value += '3';     //****
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='black-off.png';
       clearInterval(document.myTimer);
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(63);                                     //****
}"  >



<img id="my04" src="white-off.png"   style="position:relative; top:0px; left:-64px; z-index:1;"  ontouchstart="{
  this.src='white-on.png';   

  myPlay8(329.63, 64);     // E 4 	64 		329.63
  document.getElementById('myArea01').value += '4';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='white-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500);  
      myStop8(64);   
      return false // to stop the button click
}"  onmousedown="{
  this.src='white-on.png';  

  myPlay8(329.63, 64);     // E 4 	64 		329.63
  document.getElementById('myArea01').value += '4';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='white-off.png';
       clearInterval(document.myTimer);      
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(64);   
}"  >


<img id="my05" src="white-off.png"   style="position:relative; top:0px; left:-71px; z-index:1;"  ontouchstart="{
  this.src='white-on.png';   

  myPlay8(349.23, 65);     // F 4 	65 		349.23
  document.getElementById('myArea01').value += '5';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='white-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500);  
      myStop8(65);   
      return false // to stop the button click
}"  onmousedown="{
  this.src='white-on.png';  

  myPlay8(349.23, 65);     // F 4 	65 		349.23
  document.getElementById('myArea01').value += '5';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='white-off.png';
       clearInterval(document.myTimer);      
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(65);   
}"  >




<img id="my06" src="black-off.png"   style="position:relative; top:-31px; left:-84px; z-index:3;"  ontouchstart="{
  this.src='black-on.png';   


  myPlay8(369.99, 66);  // F# 4 	66 		369.99
  document.getElementById('myArea01').value += '6';   //****
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='black-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500); 
      myStop8(66);                                      //****
      return false // to stop the button click
}"  onmousedown="{
  this.src='black-on.png';  

  myPlay8(369.99, 66);  // F# 4 	66 		369.99
  document.getElementById('myArea01').value += '6';     //****
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='black-off.png';
       clearInterval(document.myTimer);
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(66);                                     //****
}"  >


<img id="my07" src="white-off.png"   style="position:relative; top:0px; left:-99px; z-index:1;"  ontouchstart="{
  this.src='white-on.png';   

  myPlay8(391.99, 67);     // G 4 	67 		391.99
  document.getElementById('myArea01').value += '7';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='white-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500);  
      myStop8(67);   
      return false // to stop the button click
}"  onmousedown="{
  this.src='white-on.png';  

  myPlay8(391.99, 67);     // G 4 	67 		391.99
  document.getElementById('myArea01').value += '7';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='white-off.png';
       clearInterval(document.myTimer);      
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(67);   
}"  >




<img id="my08" src="black-off.png"   style="position:relative; top:-31px; left:-111px; z-index:3;"  ontouchstart="{
  this.src='black-on.png';   

  myPlay8(415.31, 68);  // G# 4 	68 		415.31
  document.getElementById('myArea01').value += '8';   //****
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='black-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500); 
      myStop8(68);                                      //****
      return false // to stop the button click
}"  onmousedown="{
  this.src='black-on.png';  

  myPlay8(415.31, 68);  // G# 4 	68 		415.31
  document.getElementById('myArea01').value += '8';     //****
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='black-off.png';
       clearInterval(document.myTimer);
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(68);                                     //****
}"  >



<img id="my09" src="white-off.png"   style="position:relative; top:0px; left:-127px; z-index:1;"  ontouchstart="{
  this.src='white-on.png';   

  myPlay8(440.00, 69);     // A 4 	69 		440.00
  document.getElementById('myArea01').value += '9';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='white-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500);  
      myStop8(69);   
      return false // to stop the button click
}"  onmousedown="{
  this.src='white-on.png';  

  myPlay8(440.00, 69);     // A 4 	69 		440.00
  document.getElementById('myArea01').value += '9';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='white-off.png';
       clearInterval(document.myTimer);      
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(69);   
}"  >




<img id="my10" src="black-off.png"   style="position:relative; top:-31px; left:-138px; z-index:3;"  ontouchstart="{
  this.src='black-on.png';   


  myPlay8(466.16, 70);  // A# 4 	70 		466.16
  document.getElementById('myArea01').value += '@';   //****
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='black-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500); 
      myStop8(70);                                      //****
      return false // to stop the button click
}"  onmousedown="{
  this.src='black-on.png';  

  myPlay8(466.16, 70);  // A# 4 	70 		466.16
  document.getElementById('myArea01').value += '@';     //****
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='black-off.png';
       clearInterval(document.myTimer);
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(70);                                     //****
}"  >



<img id="my11" src="white-off.png"   style="position:relative; top:0px; left:-156px; z-index:1;"  ontouchstart="{
  this.src='white-on.png';   

  myPlay8(493.88, 71);     // B 4 	71 		493.88 	
  document.getElementById('myArea01').value += '*';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='white-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500);  
      myStop8(71);   
      return false // to stop the button click
}"  onmousedown="{
  this.src='white-on.png';  

  myPlay8(493.88, 71);     // B 4 	71 		493.88
  document.getElementById('myArea01').value += '*';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='white-off.png';
       clearInterval(document.myTimer);      
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(71);   
}"  >



<img id="my12" src="white-off.png"   style="position:relative; top:0px; left:-164px; z-index:1;"  ontouchstart="{
  this.src='white-on.png';   

  myPlay8(523.25, 72 );     // C 5 	72 		523.25
  document.getElementById('myArea01').value += '\'0';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
  return false // to stop the button click
}"    ontouchend="{
      this.src='white-off.png';
      clearInterval(document.myTimer);
      document.myTimer = setInterval('myRest()', 500);  
      myStop8(72 );   
      return false // to stop the button click
}"  onmousedown="{
  this.src='white-on.png';  

  myPlay8(523.25, 72 );     // C 5 	72 		523.25
  document.getElementById('myArea01').value += '\'0';
  clearInterval(document.myTimer);
  document.myTimer = setInterval('myAdd()', 200);
}"     onmouseup="{
       this.src='white-off.png';
       clearInterval(document.myTimer);      
       document.myTimer = setInterval('myRest()', 500); 
       myStop8(72 );   
}"  >






























<textarea id="myArea01" rows=20 cols=50><?php echo ($output |= "")? $output : "47'0_" ?></textarea>
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







