<?php

$username = $_POST['username'];
if($_POST['username'] == "") { die("Can't be blank!"); }

@$infoUUID = json_decode(file_get_contents("https://api.mojang.com/users/profiles/minecraft/".$username."?at=0"), true);

if($infoUUID['name'] != ""){
	$infoHistory = json_decode(file_get_contents("https://api.mojang.com/user/profiles/".$infoUUID["id"]."/names"), true);

	$textureUrl = "https://sessionserver.mojang.com/session/minecraft/profile/".$infoUUID["id"];
	$texture = file_get_contents($textureUrl);
	$texture = json_decode($texture,true);
	$texture =  $texture["properties"][0]["value"];
	$texture = base64_decode($texture);
	$texture = json_decode($texture,true);
	$texture =  $texture["textures"]["SKIN"]["url"];



	echo "<table style='min-width:100%;'><tr><td><h2>Username: </hh2></td><td><h2>".$infoUUID['name']."</h2></td><td><h2><img src='draw.php?image=".$texture."' width=64  height=64 /></h2></td></tr></table>";
	echo "<p>UUID: " . $infoUUID["id"] . "</p>";
	echo "<h3>History:</h3>";
	echo "<table style='border-style:solid; min-width:80%; text-align:center;'><tr><th>Name</th><th></th><th>Date</th></tr>";
	foreach($infoHistory as $historyArray){
		if(!isset($historyArray["changedToAt"])){
			$time = "N/A";
		}
		else {
			$time = $historyArray["changedToAt"] / 1000;
			$time = date("Y-m-d | H:i:s",$time);
		}
		echo "<tr style='border-style:solid;'><td style='border-style:solid;'><b>" . $historyArray["name"] . "</b><td style='border-style:none;'> <center>@</center> </td> <td style='border-style:solid;'> " . $time . "</td> "."</td></tr>";
	}
			//echo "<a style='width:100%' href='".$texture."' download><button>Download Skin</button></a>";
	echo "</table>";


}
else {
	echo "No info to display :(";
}
?>