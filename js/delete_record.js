
function deleteRecord(){

  var nu_id = document.getElementById("nu_id").value;

  // simple field check
  if(nu_id == ""){
    alert("Enter NU-ID");
    return 0;
  }

  var dataString = "nu_id="+nu_id;

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://192.168.1.102/SourceCode/php/delete_record.php?"+dataString, true);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText.includes("error")){
        alert("Server-Side Error\nError: " + this.responseText);
        return 0;
      }
      else{
        alert("Member Succesfully Deleted");
        document.getElementById("del_btn").disabled = true;
        return 0;
      }
    }
  };
  xhttp.send();
}
