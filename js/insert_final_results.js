
function insertResults(){
  var event_name = document.getElementById("event_name_form2").value;
  var event_year = document.getElementById("year_form2").value;
  var comp_name = document.getElementById("comp_name_form2").value;
  var winner_id = document.getElementById("win_tid").value;
  var runner_id = document.getElementById("ru_tid").value;

  if(event_name == "Select Event" || comp_name == "Select Competition" || event_year=="" || winner_id=="" || runner_id==""){
    alert("Check Fields!");
    return 0;
  }

  var dataString = "ENAME="+event_name+"+&CNAME="+comp_name+"+&EYEAR="+event_year+"+&WID="+winner_id+"+&RID="+runner_id;

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://192.168.1.102/SourceCode/php/insert_final_results.php?"+dataString, true);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText.includes("error")){
        alert("SERVER-SIDE ERROR\nERROR: " + this.responseText);
        return 0;
      }
      else{
        alert("Update Successful!");
        location.reload();
        return 0;
      }
    }
  };
  xhttp.send();
}
