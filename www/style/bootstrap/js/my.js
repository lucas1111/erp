/**
表单验证函数
*/
function getFocus(){  //设置用户名文本框获取焦点
    document.getElementById("txtuname").focus();
}

//过滤用户输入的空格
function ignoreSpaces(string){
  var temp = "";
  string = '' + string;
  splitstring = string.split(" ");
  for(i = 0; i < splitstring.length; i++)
    temp += splitstring[i];
  return temp;
}
function trim(str){ //删除左右两端的空格
  return str.replace(/(^\s*)|(\s*$)/g, "");
}
function ltrim(str){ //删除左边的空格
  return str.replace(/(^\s*)/g,"");
}
function rtrim(str){ //删除右边的空格
  return str.replace(/(\s*$)/g,"");
}

//判断字符是否有中文字符  
function isHasChn(s)  {   
    var patrn= /[\u4E00-\u9FA5]|[\uFE30-\uFFA0]/gi;   
    if (!patrn.exec(s)){   
        return false;   
    }else{   
        return true;   
    }   
} 
 
function checkname(){  //检查用户名
    //alert("123");
    var myname=document.getElementById("staffName").value;
    var myDivname=document.getElementById("divNameTip");
    myname = ignoreSpaces(myname);

    if(myname==""){
        myDivname.innerHTML="<font color='red'>用户名不能为空!</font>";
        return false;
    }
    for(var i=0;i<myname.length;i++){
        var text=myname.charAt(i);
        if(!(text<=9&&text>=0)&&!(text>='a'&&text<='z')&&!(text>='A'&&text<='Z')&&!isHasChn(text)){
          myDivname.innerHTML="<font color='red'>用户名只能由数字、字母、下划线组成！</font>";
          break;
        }
    }
    if(i>=myname.length){
        document.getElementById("staffName").value = myname;
        myDivname.innerHTML="<font color='green'>√</font>";
        return true;
    }
}

 
function checkpassword(){  //检查密码
  var mypassword=document.getElementById("password").value;
  var myDivpassword=document.getElementById("divPasswordTip");
   
  if(mypassword==""){
    myDivpassword.innerHTML="<font color='red'>密码不能为空!</font>";
    return false;
  }else if(mypassword.indexOf(" ") >= 0){
    myDivpassword.innerHTML="<font color='red'>密码中不能包含空格符！</font>";
    return false;
  }else if(mypassword.length<6){
    myDivpassword.innerHTML="<font color='red'>密码至少应为六位!</font>";
    return false;
  }else if(mypassword.length>=6){
    myDivpassword.innerHTML="<font color='green'>√</font>";
    return true;
  }

}


function checkRetypePWD(){  //检查确认密码
  var myRetypePWD=document.getElementById("RetypePWD").value;
  var myDivRetypePWD=document.getElementById("divRetypeTip");
  if(myRetypePWD==""){
     myDivRetypePWD.innerHTML="<font color='red'>确认密码不能为空!</font>";
     return false;
  }else if(document.getElementById("password").value!=document.getElementById("RetypePWD").value){
    myDivRetypePWD.innerHTML="<font color='red'>确认密码与密码不一致!</font>";
    return false;
  }else{
    myDivRetypePWD.innerHTML="<font color='green'>√</font>";
    return true;
  }
}


function checkTelephone(){  //检查电话号码
  var mytelephone=document.getElementById("Telephone").value;
  var myDivtelephone=document.getElementById("divTelephoneTip");
  mytelephone = ignoreSpaces(mytelephone);
  document.getElementById("Telephone").value=mytelephone;

  if(mytelephone!=""){
    var reg = /^[0-9]{11}$/i;
    if(!reg.test(mytelephone)){
        myDivtelephone.innerHTML="<font color='red'>只能输入11位数字！例：1531710837或05914785214</font>";
        return false;
    }else{
      myDivtelephone.innerHTML="<font color='green'>√</font>";
      return true;
    }
  }else if(mytelephone==""){
    myDivtelephone.innerHTML="<font color='red'>电话号码不能为空！</font>";
    return false;
  }else{
    myDivtelephone.innerHTML="<font color='green'>√</font>";
    return true;
  }
}


function checkEmail(){  //检查E-mail
  var myemail=document.getElementById("Email").value;
  var myDivemail=document.getElementById("divEmailTip");
  if(myemail!=""){
    var reg = /^[0-9a-zA-Z_-]+@[0-9a-zA-Z_-]+(\.[0-9a-zA-Z_-]+){0,3}$/;
    if(!reg.test(myemail)){
      myDivemail.innerHTML="<font color='red'>E-mail格式不正确！例：123456@qq.com</font>";
      return false;
    }
    else{
      myDivemail.innerHTML="<font color='green'>√</font>";
      return true;
    }
  }else if(myemail==""){
    myDivemail.innerHTML="<font color='red'>邮箱不能为空！</font>";
    return false;
  }else{
     myDivemail.innerHTML="<font color='green'>√</font>";
     return true;
  }
}


function checkall(){  //检查所有
  //过滤用户输入地址中的空格
  var myAddress = document.getElementById("address").value;
  document.getElementById("address").value=ignoreSpaces(myAddress);
  //alert(ignoreSpaces(myAddress));
  checkNameExist();
  //检查所有必填项是否全部填写无误
  if(checkname()&&checkpassword()&&checkRetypePWD()&&checkTelephone()&&checkEmail()&&checkNameFlag){
    return true;
  }

    return false;
}

//检查所有重新编辑的信息
function checkEditAll(){  
  //过滤用户输入地址中的空格
  var myAddress = document.getElementById("address").value;
  //ignoreSpaces(myAddress);
  document.getElementById("address").value=ignoreSpaces(myAddress);
  //alert(ignoreSpaces(myAddress));

  //检查所有必填项是否全部填写无误
  if(checkname()&&checkTelephone()&&checkEmail()){
    return true;
  }

    return false;
}


//检查复选框的选中与否，并控制按钮的状态
function checkcBeSelected(){
  var a=document.registerForm.regiaterBtn;
  if(checkall()){
    if(document.registerForm.regiaterCheck!=null){
      if(document.registerForm.regiaterCheck.checked){
        a.disabled=false;
        return
      }else{
        a.disabled=true;
        return
      }
    }else{
      a.disabled=true;
      return
    }    
  }else{

    alert("注册信息填写无误后方可提交！");
    document.registerForm.regiaterCheck.checked=false;
  }
}

//修改信息中用于检查复选框的选中与否，并控制按钮的状态
function checkEdit(){
  //alert("修改信息填写无误后方可提交！");
  var a=document.editForm.editBtn;
  //alert(checkEditAll());
  if(checkEditAll()){
    //alert("修改信息填写无误,可以提交！");
    if(document.editForm.editBtn!=null){
      //alert("1");
      if(document.editForm.editCheck.checked){
        //alert("2");
        a.disabled=false;
        return
      }else{
        a.disabled=true;
        return
      }
    }else{
      a.disabled=true;
      return
    }    
  }else{

    alert("修改信息填写无误后方可提交！");
    document.editForm.editCheck.checked=false;
  }
}


/*无刷新验证用户名AJAX*/
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
//获取指定元素
function element(id){
  var temp=document.getElementById(id);
  //alert(temp);
  return temp;
}

var myXmlHttpRequest ="";
function checkNameExist(){
  if(element('staffName').value!=""){
    //第一步：创建对象
    myXmlHttpRequest = getXmlHttpObject();
    if(myXmlHttpRequest){
      //通过XMLHttpRequest对象发送请求到http服务器的某个面
      //第一个参数表示请求方式：1.GET 2.POST
      //第二个参数指定url，对哪个页面发出AJAX请求(本质仍然是http请求)
      //第三个参数，true表示使用异步机制，false则不使用
      var url = "/controller/checkName.con.php?staffName="+element('staffName').value;
      //alert(url);
      //打开请求
      myXmlHttpRequest.open("GET",url,true);
      //指定回调函数，backHandle是函数名
      myXmlHttpRequest.onreadystatechange=backHandle;
      //第二步：
      //发送请求，如果是GET的话，填入null即可
      //如果是POST的话，则填入实际数据
      myXmlHttpRequest.send(null);
   
    }else{
      window.alert("创建失败！");
      return false;
    }
  }else{
    var myDivname=document.getElementById("divNameTip");
    myDivname.innerHTML="<font color='red'>用户名不能为空!</font>";
    return false;
  }
}

var checkNameFlag=false;

//第四步：回调函数backHandle
function backHandle(){
  //window.alert("回调函数被调回："+myXmlHttpRequest.readyState);
  //取出checkName.con.php页面返回的数据
  if(myXmlHttpRequest.readyState==4){
    //取值要根据返回信息的格式定。此处用text
    //window.alert("获取服务器返回信息->"+myXmlHttpRequest.responseText);
    var myDivname=document.getElementById("divNameTip");
    myDivname.innerHTML=myXmlHttpRequest.responseText;
    if(myXmlHttpRequest.responseText.indexOf("用户名已存在")>0){
      checkNameFlag =false;
      return false;
    }else{
      checkNameFlag =true;
      return true;
    }

  }
}


function authorization(){
  var a=document.getElementById("recordDelete");
  a.href='#';
  window.alert("无权限进行该操作！!！");
}