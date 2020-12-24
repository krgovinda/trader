function validateMobileAj(str){
    let req = new XMLHttpRequest();
    req.open('get','http://localhost/Project-%20Akshay%20traders/validuser.php?id='+str,true);
    req.send();
    req.onreadystatechange=function(){
        if(req.readyState==4 && req.status==200){
            document.getElementById('msg-for-username').innerHTML = req.responseText;
        }
    };
}

function validateEmailAj(str){
    let req = new XMLHttpRequest();
    req.open('get','validemail.php?e='+str,true);
    req.send();
    req.onreadystatechange=function(){
        if(req.readyState==4 && req.status==200){
            document.getElementById('msg-for-useremail').innerHTML = req.responseText;
        }
    };
}
