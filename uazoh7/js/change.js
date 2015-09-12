window.onload = function (){
    var url = window.location.pathname;
    var id;
    if (url.indexOf('film') > 0) {
        id = '1';
    } else if (url.indexOf('communication') > 0) {
        id = '2'; 
    } else if (url.indexOf('design') > 0 ){
        id = '3';
    } else if (url.indexOf('innovation') > 0) {
        id = '4';
    }
    ajaxRequest(id);
    console.log(id);
}
	var xmlHttpRequest = null;
	var content,
        contenting;
    function ajaxRequest(type_id)
    {   //console.log();
        if(window.ActiveXObject) 
        {
            xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else if(window.XMLHttpRequest) 
        {
            xmlHttpRequest = new XMLHttpRequest();
        }
        if(null != xmlHttpRequest)
        {   
            
            //console.log();
            //xmlHttpRequest.open("GET", "ajaxCallBack.php?up_type="+up_type, true);
            xmlHttpRequest.open("POST", "http://localhost/wordpress/wp-content/themes/uazoh7/callback.php?type_id="+type_id, true);
             
            xmlHttpRequest.onreadystatechange = callback;

            
            xmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

            
            xmlHttpRequest.send(null);    
            //xmlHttpRequest.send(null); 
        }
    }

function callback()
{
    if(xmlHttpRequest.readyState == 3)
    {
        if(xmlHttpRequest.status == 200)
        {
            contenting = xmlHttpRequest.responseText;
            content = JSON.parse(contenting);
            console.log(content);
			setValue(content);
        }
    }
}


function setValue(content){
    var div_content = document.getElementById("div_content");
    var _html = "";
    for(var i = 0;i < 5;i++){
        _html += "<div><a href='?id="+content[i].id+"'><img src=http://localhost/wordpress/wp-content/themes/uazoh7/img/images/"+ content[i].id +".jpg><span>"+ content[i].name +"</span></a></div>";
    }
        div_content.innerHTML = _html;
}
