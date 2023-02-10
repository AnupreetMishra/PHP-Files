<?php
$x =5; // global variable
function setVar(){
    echo "$x";
}
setVar();
echo " <br> var is outside the function $x";

////******LOcal variable******* */


function localVar(){
    $w = 10;
    echo " <br> local variable is accessible inside the function: $w";
}
localVar();
// echo " <br> local variable is only in inside the function just like :$w";



//************global variable acces using global keyword */

$x=5;// global variable
$y = 5;// global variable
function myTest(){
    global $x,$y;
    $x = $x+$y;
    
   
}
myTest();
echo "<br> global variable access using global keyword $x";




// ********************************GLOBAL[index]********************///

$a=5;
$b=9;
function globalIndex(){
    $GLOBALS['c'] = $GLOBALS['a']+$GLOBALS['b'];
}
globalIndex();
echo "<br> variable access using GLOBAL[index]:$c ";


//////*******STATIC KEYWORD*******/

function staticKeyword(){
    static $x =0;
    echo "<br> this is incresing your static variabl's value continuously $x";
    $x++;
}
staticKeyword();
staticKeyword();
staticKeyword();
staticKeyword();
staticKeyword();
staticKeyword();
staticKeyword();
staticKeyword();
staticKeyword();
staticKeyword();
staticKeyword();
staticKeyword();




?>