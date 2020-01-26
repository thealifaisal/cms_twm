
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("Heads").innerHTML = this.responseText;
    }
};
xmlhttp.open("GET","http://192.168.1.102/SourceCode/php/Heads.php",true);
xmlhttp.send();
