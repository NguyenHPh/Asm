function object(){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
       xmlhttp=new XMLHttpRequest();
        return xmlhttp;
    }
}
     http = object();
    function liveSearch(data){
        if(data != ""){
            http.onreadystatechange = process;
            http.open('GET', '../classes/get.php?data=' + data, true);
            http.send();
        }else{
            document.getElementById("result").innerHTML = "";
        }
    }
    
    function process(){
        if(http.readyState==4 && http.status==200){
            var result = http.responseText;
            document.getElementById("result").innerHTML = result;
        }
    }