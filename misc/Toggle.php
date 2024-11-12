<?php
require( '../Settings.php');
if ($Settings['use_gzip']==true) {
if($Settings['preinset']=="on") {
ini_set("zlib.output_compression","On");
ini_set("zlib.output_compression_level","2"); }
ob_start( 'ob_gzhandler' );	}
header('Content-type: application/x-javascript');
?>
<!--
function getid(id)
{
itm = document.getElementById(id);
return itm;
}
function toggleview(id)
{
if (itm.style.display == "none")
{
itm.style.display = "";
}
else
{
itm.style.display = "none";
}
}
function toggletag(id)
{
getid(id);
toggleview(id);
}
function bgchange(id,color)
{
getid(id);
itm.style.backgroundColor = ''+color+'';
}
/*
//Create an array 
var allPageTags = new Array(); 
function doSomethingWithClasses(theClass) {
//Populate the array with all the page tags
var allPageTags=document.getElementsByTagName("*");
//Cycle through the tags using a for loop
for (i=0; i<allPageTags.length; i++) {
//Pick out the tags with our class name
if (allPageTags[i].className==theClass) {
//Manipulate this in whatever way you want
allPageTags[i].style.display='none';
}
}
} 
function getElementsByAttribute(attr,val,container)
{
container = container¦¦document
var all = container.all¦¦container.getElementsByTagName('*')
var arr = []
for(var k=0;k<all.length;k++)
if(all[k].getAttribute(attr) == val)
arr[arr.length] = all[k]
return arr
} 
function getElementsByCondition(condition,container)
{
container = container¦¦document
var all = container.all¦¦container.getElementsByTagName('*')
var arr = []
for(var k=0;k<all.length;k++)
{
var elm = all[k]
if(condition(elm,k))
arr[arr.length] = elm
}
return arr
}*/
//-->