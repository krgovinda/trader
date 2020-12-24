function validateUser(str) {
    var req = new XMLHttpRequest();
    req.open('get', 'http://localhost/Project-%20Akshay%20traders/uservalidation.php?user='+str,true);
    req.send();
    req.onreadystatechange = function() {
      if(req.readyState==4 && req.status==200)
          document.getElementById("msg-for-username").innerHTML =req.responseText;
    };
}