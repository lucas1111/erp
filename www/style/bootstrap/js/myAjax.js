/**
 站内联系相关js函数
*/
	function id(id){
		return document.getElementById(id);
	}


	function showCurrentContact(obj){
		cleanDialogue();
		//window.alert( $(obj));
		//window.alert( obj.innerHTML);
		//window.alert( obj.value);
		/*Firefox does not support the <code>innerText</code> property so this example will fail.*/ 
		//window.alert( obj.innerText);
		//id('currentContact').innerHTML = obj.innerHTML;
		var test ;
		test = id('currentContact');
		test.innerHTML = obj.innerHTML;
		//window.alert(test.innerHTML);
	}

	function getXmlHttpObject(){
		var xmlHttp=null;
		if(window.XMLHttpRequest){// code for IE7, Firefox, Opera, etc.
			xmlHttp = new XMLHttpRequest();
		}else if(window.ActiveXObject){// code for IE6, IE5
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	/*
	  if(xmlHttp!=null){
	    xmlHttp.open("GET", "note.xml", false);
	    xmlHttp.send(null);
	    xmlDoc=xmlHttp.responseText;

	    xmlHttp.open("POST", "demo_dom_http.asp", false);
	    xmlHttp.send(xmlDoc);
	    document.write(xmlHttp.responseText);
	  }else{
	    alert("Your browser does not support XMLHTTP.");
	  }
	*/
	  return xmlHttp;
	}


	function cleanDialogue(){
		id('myContents').value="";
	}


	function sendMessage(){
		if(id('currentContact').innerHTML!="未选择"){
			id('myContents').value+=new Date().toLocaleString()+"--【 "+id('userName').innerHTML+" 】: "+id("con").value+"\r\n";
			//创建Ajax-XMLHttpRequest对象
			var myXmlHttpRequest = getXmlHttpObject();
			if(myXmlHttpRequest){
				var url = "/controller/sendMessage.con.php";
				var data = "con="+ id("con").value+"&getter="+id('userName').innerHTML
				+"&sender="+id('currentContact').innerHTML;
				//window.alert(url+"/"+data);
				myXmlHttpRequest.open("post",url,true);
				myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				myXmlHttpRequest.onreadystatechange = function (){
					if(myXmlHttpRequest.readyState==4){
						if(myXmlHttpRequest.status==200){
							//这里为发送信息，暂时不需要处理
							//var mesRes = myXmlHttpRequest.responseText;
							//if(myXmlHttpRequest.responseText.indexOf("插入失败")>0){
							//	window.alert("发送失败！");
							//}
							

						}
					}
				}
				//发送数据
				myXmlHttpRequest.send(data);
				id("con").value="";
			}

		}else{
			window.alert("请选择联系人！");
		}


	}

	window.setInterval("getMessage()",5000);

	function getMessage(){

			//创建Ajax-XMLHttpRequest对象
			var myXmlHttpRequest = getXmlHttpObject();
			if(myXmlHttpRequest){
				var url = "/controller/getMessage.con.php";
				var data = "&getter="+id('userName').innerHTML
				+"&sender="+id('currentContact').innerHTML;
				//window.alert(url+"/"+data);
				myXmlHttpRequest.open("post",url,true);
				myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				myXmlHttpRequest.onreadystatechange = function (){
					if(myXmlHttpRequest.readyState==4){
						if(myXmlHttpRequest.status==200){
							//这里数据处理
							var mesRes = myXmlHttpRequest.responseXML;
							//1.取出con和sendTime
							var cons = mesRes.getElementsByTagName("con");
							var sendTimes = mesRes.getElementsByTagName("sendTime");
						    //window.alert(cons.length);
						    if(cons.length!=0){
						    	//window.alert(cons.length);
						    	//处理数据
						    	for (var i=0;i<cons.length; i++) {
						    		id('myContents').value+=sendTimes[i].childNodes[0].nodeValue+"--From【"+id('currentContact').innerHTML+"】: "
						    		+cons[i].childNodes[0].nodeValue+" "
						    		+"\r\n";
						    	}
						    	//window.alert(id('myContents').value);
						    }
						}
					}
				}
				//发送数据
				myXmlHttpRequest.send(data);
			}




	}
