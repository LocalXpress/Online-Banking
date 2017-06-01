<?php

function generateRandomString($length) 
{
	//function to generate random strings
    echo $length;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
<script>
function hi()
{
	var i=2;  
	var j=3;  
	var arr="<?php echo generateRandomString(i);?>";
	document.getElementById("demo").innerHTML=arr;
}
</script>
<html>
<body onload="hi()">
<div id="demo"></div>
</body>
</html>