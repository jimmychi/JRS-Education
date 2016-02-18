<?php
session_start();
error_reporting(E_ALL^ E_WARNING);
include 'functions.php';
if(!isset($_SESSION['admin'])){
	header("Location: /");
}
$query = "select * from users where admin = 'no'";
$result = mysql_query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administration</title>
	<script type="text/javascript" src="js/functions.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">		
	<style>
		#rightDiv{
			border: 0px solid;
			margin: 0 auto;
			width: 960px;
			min-height: 300px;
		}
		#pagename{
			height: 25px;
			width: 120px;
			font-size: 15px;
			margin-bottom: 10px;
		}
	</style>	
	<script type="text/javascript" src="js/tinymce.min.js"></script> 	
    <script type="text/javascript">
	tinymce.init({		
		selector: "textarea",
		plugins: ["save,textcolor,lists,link","advlist autolink lists link charmap print preview anchor","searchreplace visualblocks code fullscreen","insertdatetime table contextmenu paste jbimages"],
		textcolor_map: [
        "000000", "Black",
        "993300", "Burnt orange",
        "333300", "Dark olive",
        "003300", "Dark green",
        "003366", "Dark azure",
        "1F3566", "Navy Blue",
        "333399", "Indigo",
        "333333", "Very dark gray",
        "800000", "Maroon",
        "FF6600", "Orange",
        "808000", "Olive",
        "008000", "Green",
        "008080", "Teal",
        "0000FF", "Blue",
        "666699", "Grayish blue",
        "6f7071", "Gray",
        "FF0000", "Red",
        "FF9900", "Amber",
        "99CC00", "Yellow green",
        "339966", "Sea green",
        "33CCCC", "Turquoise",
        "3366FF", "Royal blue",
        "800080", "Purple",
        "999999", "Medium gray",
        "FF00FF", "Magenta",
        "FFCC00", "Gold",
        "FFFF00", "Yellow",
        "73C167", "Lime",
        "00FFFF", "Aqua",
        "00CCFF", "Sky blue",
        "993366", "Brown",
        "C0C0C0", "Silver",
        "FF99CC", "Pink",
        "FFCC99", "Peach",
        "FFFF99", "Light yellow",
        "CCFFCC", "Pale green",
        "CCFFFF", "Pale cyan",
        "99CCFF", "Light sky blue",
        "CC99FF", "Plum",
        "FFFFFF", "White"
    ],		
		width: 995,
		height: 500,
		toolbar: "bold italic hr forecolor backcolor link | bullist numlist outdent indent | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect | jbimages | save",
		save_enablewhendirty: false,
		relative_urls: false,
		entity_encoding: "raw",
		save_onsavecallback: function() {			
			var description = $("#description").val();
			var keywords = $("#keywords").val();
			var title = $("#title").val();
			var content = $.trim($("#contentTextArea").val());
			var pagename = $("#pagename option:selected").val();	
					
			$("#adminResult").html("");				

			//dataString = "pagename=" + pagename + "&topcontent=" + topcontent;				
			$.ajax({
				type: "POST",
				url: "updateContent.php",
				async: false,
				data: {content: content, pagename: pagename},
				dataType: "json",
				success: function(resultArray){
					if(resultArray.status == "good"){
						$("#adminResult").html("Upload successful");				
					}else{
						$("#adminResult").html("Failed to upload"); 	
					}
					return false;
				}
			})				
		}			
	});
    </script>    	
</head>
<body>
	<?php include "header.php" ?>
	<div style="clear:both"></div>
	<div id="rightDiv">
		<br />
		<form name="search-form" id="search-form" method="POST">
			<select id="pagename" name="pagename" onChange="getPageValues()">
				<option selected disabled>Select a page</option>
				<option value="homepage">Homepage</option>
				<option value="about">About Us</option>
				<!--option value="contact">Contact Us</option-->
				<option value="teach-abroad">Teach-Abroad</option>
				<!--option value="apply">Apply</option-->
			</select>	
			<br />			
			<b>Title</b><br />
			<input type="text" size="90" name="title" id="title" class="inputText" /><br />
			<b>Meta Description</b><br />
			<input type="text" size="90" name="description" id="description" class="inputText" /><br />				
			<b>Meta Keywords</b><br />
			<input type="text" size="90" name="keywords" id="keywords" class="inputText" /><br />
			<input type="submit" value="Update" id="submitBtn" />
			<div id="rDiv"></div><br />
		
		<div id="div1">
            <span id="cTitle">Content</span><br />
            <textarea name="contentTextArea" id="contentTextArea" rows="14" cols="90"></textarea>
		</div>
		<div id="div2">
			<select id="step" name="step" onChange="getApplyValues()">
				<option selected disabled>Select a step</option>
				<option value="step1">Step 1</option>
				<option value="step2">Step 2</option>
				<option value="step3">Step 3</option>
				<option value="step4">Step 4</option>
				<option value="step5">Step 5</option>
				<option value="step6">Step 6</option>
				<option value="step7">Step 7</option>
			</select>		
			<br />	
			<textarea size="90" name="applyContent" id="applyContent" class="inputText" ></textarea>
		</div>
		<div id="adminResult"></div>
		</form>					
	</div>
	<br /><br />
	<?php include "footer2.php" ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>		
<script src="js/functions.js"></script>
<script>
$(document).ready(function() {		
	$("#search-form").submit(function(e){	
		e.preventDefault();
			
		var pagename = $("#pagename option:selected").val();
		var description = $("#description").val();
		var keywords = $("#keywords").val();
		var title = $("#title").val();
		$("#rDiv").html("");
		
		if(pagename == "Select a page"){
			alert("Please select a page");
			return false;
		}else{
			$.ajax({
				type: "POST",
				url: "updatePage.php",
				async: false,
				data: {title: title, description: description, keywords: keywords, pagename: pagename},
				dataType: "json",
				success: function(result){
					if(result.status == "good"){
						$("#rDiv").html("Upload successful");
					}else{
						$("#rDiv").html("Failed to upload");
					}	
				}
			})
		}			
	});
});
</script>	
</body>
</html>