/*
function updateHTML(elmId, value) {
  var elem = document.getElementById(elmId);
  if(typeof elem !== 'undefined' && elem !== null) {
    document.getElementById(elmId).innerHTML = value;
  }
}
*/
//Returns 0 for no documents, 1 for Pending, 2 for Documents Accepted		
function showStatus(status, id){
	var docString = "";
	if(status == 0){
		docString += "<a href=\"documents.php?id=" +  id  + "\" target=\"_blank\">Received no documents</a>";
	}else if(status == 1){
		docString += "<a href=\"documents.php?id=" +  id  + "\" target=\"_blank\">Pending</a>";
	}else if(status == 2){
		docString += "<a href=\"documents.php?id=" + id + "\" target=\"_blank\">Documents accepted</a>";
	}else{

	}
	return docString;		
}
function getPageValues(){	

	var dataString = "pagename=" + $("#pagename option:selected").val();
	$("#adminResult").html("");
	$("#rDiv").html("");	
	
	if($("#pagename option:selected").val() == "apply"){
		$("#div1").css("display","none");
		$("#div2").css("display","block");
	
	}else{
		$("#div1").css("display","block");
		$("#div2").css("display","none");
	}	

	$.ajax({
		type: "POST",
		url: "getPageData.php",
		async: false,
		data: dataString,
		dataType: "json",
		success: function(resultArray){
			if(resultArray.status == "good"){
				tinymce.get('contentTextArea').setContent(resultArray.content);
				
				var $head = $("#contentTextArea_ifr").contents().find("head");
				var url = "css/style.css";
				$head.append($("<link/>", { rel: "stylesheet", href: url, type: "text/css" } ));								
					
				if(resultArray.pagename == "homepage"){
					var url2 = "css/index.css";
				}else if(resultArray.pagename == "about"){
					var url2 = "css/about.css";
				}else if(resultArray.pagename == "contact"){
					var url2 = "css/contact.css";
				}else if(resultArray.pagename == "teach-abroad"){
					var url2 = "css/teachabroad.css";
				}else if(resultArray.pagename == "apply"){
					var url2 = "css/apply.css";
				}	
				$head.append($("<link/>", { rel: "stylesheet", href: url2, type: "text/css" } ));				
				
				$("#title").val(resultArray.title);
				$("#description").val(resultArray.description);
				$("#keywords").val(resultArray.keywords);
			}
			return false;
		}		
	})
}	
function getApplyValues(){

	var stepVal = $("#step option:selected").val();

	$.ajax({
		type: "POST",
		url: "getStepValues.php",
		async: false,
		data: dataString,
		dataType: "json",
		success: function(resultArray){
			if(resultArray.status == "good"){
					if(stepVal == "step1"){
						tinymce.get('contentTextArea').setContent(resultArray.step1);					
					}else if(stepVal == "step2"){	
						tinymce.get('contentTextArea').setContent(resultArray.step2);
					}else if(stepVal == "step3"){	
						tinymce.get('contentTextArea').setContent(resultArray.step3);
					}else if(stepVal == "step4"){	
						tinymce.get('contentTextArea').setContent(resultArray.step4);
					}else if(stepVal == "step5"){	
						tinymce.get('contentTextArea').setContent(resultArray.step5);
					}else if(stepVal == "step6"){	
						tinymce.get('contentTextArea').setContent(resultArray.step6);
					}else if(stepVal == "step7"){	
						tinymce.get('contentTextArea').setContent(resultArray.step7);
					}

					var $head = $("#contentTextArea_ifr").contents().find("head");
					var url = "css/style.css";
					$head.append($("<link/>", { rel: "stylesheet", href: url, type: "text/css" } ));				
					
					
					
					if(resultArray.pagename == "homepage"){
						var url2 = "css/index.css";
					}else if(resultArray.pagename == "about"){
						var url2 = "css/about.css";
					}else if(resultArray.pagename == "contact"){
						var url2 = "css/contact.css";
					}else if(resultArray.pagename == "teach-abroad"){
						var url2 = "css/teachabroad.css";
					}else if(resultArray.pagename == "apply"){
						var url2 = "css/apply.css";
					}	
					$head.append($("<link/>", { rel: "stylesheet", href: url2, type: "text/css" } ));				
					
				$("#title").val(resultArray.title);
				$("#description").val(resultArray.description);
				$("#keywords").val(resultArray.keywords);
			}
			return false;
		}		
	})

}