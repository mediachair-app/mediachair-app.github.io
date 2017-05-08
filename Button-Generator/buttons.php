<?php
function xcord($char){
	if($char=="A"||$char=="K"||$char=="U"||$char=="0"||$char=="a"||$char=="k"||$char=="u"||$char==",")return 0;
	elseif($char=="B"||$char=="L"||$char=="V"||$char=="1"||$char=="b"||$char=="l"||$char=="v"||$char==".")return 16;
	elseif($char=="C"||$char=="M"||$char=="W"||$char=="2"||$char=="c"||$char=="m"||$char=="w"||$char==":"||$char=="~")return 32;
	elseif($char=="D"||$char=="N"||$char=="X"||$char=="3"||$char=="d"||$char=="n"||$char=="x"||$char==";"||$char=="#")return 48;
	elseif($char=="E"||$char=="O"||$char=="Y"||$char=="4"||$char=="e"||$char=="o"||$char=="y"||$char=="!"||$char=="("||$char=="%")return 64;
	elseif($char=="F"||$char=="P"||$char=="Z"||$char=="5"||$char=="f"||$char=="p"||$char=="z"||$char=="?"||$char==")"||$char=="+")return 80;
	elseif($char=="G"||$char=="Q"||$char=="6"||$char=="g"||$char=="q"||$char=="é"||$char=="@"||$char=="-")return 96;
	elseif($char=="H"||$char=="R"||$char=="7"||$char=="h"||$char=="r"||$char=="*")return 112;
	elseif($char=="I"||$char=="S"||$char=="8"||$char=="i"||$char=="s"||$char=="/")return 128;
	elseif($char=="J"||$char=="T"||$char=="9"||$char=="j"||$char=="t"||$char=="=")return 144;
	elseif($char=="$")return 160;
	elseif($char=="'")return 176;
	elseif($char==" ")return 150;
}
function ycord($char){
	if($char=="A"||$char=="B"||$char=="C"||$char=="D"||$char=="E"||$char=="F"||$char=="G"||$char=="H"||$char=="I"||$char=="J")return 0;
	elseif($char=="K"||$char=="L"||$char=="M"||$char=="N"||$char=="O"||$char=="P"||$char=="Q"||$char=="R"||$char=="S"||$char=="T"||$char=="'")return 24; //we still miss the last 1
	elseif($char=="U"||$char=="V"||$char=="W"||$char=="X"||$char=="Y"||$char=="Z")return 48; //gender symbol is needed
	elseif($char=="0"||$char=="1"||$char=="2"||$char=="3"||$char=="4"||$char=="5"||$char=="6"||$char=="7"||$char=="8"||$char=="9")return 72;
	elseif($char=="a"||$char=="b"||$char=="c"||$char=="d"||$char=="e"||$char=="f"||$char=="g"||$char=="h"||$char=="i"||$char=="j")return 96;
	elseif($char=="k"||$char=="l"||$char=="m"||$char=="n"||$char=="o"||$char=="p"||$char=="q"||$char=="r"||$char=="s"||$char=="t")return 120;//make it 120
	elseif($char=="u"||$char=="v"||$char=="w"||$char=="x"||$char=="y"||$char=="z")return 144;
	elseif($char==","||$char=="."||$char==":"||$char==";"||$char=="!"||$char=="?"||$char=="é"||$char=="@")return 168;//male female
	elseif($char=="("||$char==")")return 192;//missing the first 3
	elseif($char=="~"||$char=="#"||$char=="%"||$char=="+"||$char=="-"||$char=="*"||$char=="/"||$char=="="||$char=="$")return 216; //miss the first 2
	elseif($char==" ")return 0;
}
function xlength($char){
	if($char=="i")return 3;
	elseif($char=="l"||$char==" ")return 4;
	elseif($char=="I"||$char=="1"||$char=="f"||$char=="j"||$char=="'"||$char=="."||$char==","||$char==":"||$char==";")return 5;
	elseif($char=="t"||$char=="!"||$char=="("||$char==")")return 6;
	else return 6;
}
//background
$img = imageCreateFromPng("but.png");
imageAlphaBlending($img, true);
imageSaveAlpha($img, true);

//icon 32x32 only
$icon = imageCreateFromPng("646-16.png");
imageAlphaBlending($icon, true);
imageSaveAlpha($icon, true);
imagecopy($img, $icon, 10, 3, 0, 0, 32, 32);
imagedestroy($icon);

//*text */
$t = imageCreateFromPng("blacktext.png");
imageAlphaBlending($t, true);
imageSaveAlpha($t, true);
$text = "Victini Dances Around";//line1
for($i=0;$i<strlen($text);$i++){
	$c=substr($text, $i, 1);
	imagecopy($img, $t, $xposition + 52,7, xcord($c), ycord($c), xlength($c), 13);
	$xposition += xlength($c);
}
$xposition = 0;
$text = "Liberty Garden";//line2
for($i=0;$i<strlen($text);$i++){
	$c=substr($text, $i, 1);
	imagecopy($img, $t, $xposition + 52, 26, xcord($c), ycord($c), xlength($c), 13);
	$xposition += xlength($c);
}

/* Output image to browser */
header("Content-type: image/png");
imagePng($img);//change back to img
imagedestroy($img);
imagedestroy($t); //remove this line
?>