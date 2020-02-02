
// element id`s
  // event_name
  // year
  // comp_name
  // team_name
  // leader_id
  // leader_name
  // leader_contact
  // p1_id
  // p1_name
  // p2_id
  // p2_name

// called function onclick on submit button
function regTeam(){
  var event_name = document.getElementById("event_name").value;
  var year = document.getElementById("year").value;
  var comp_name = document.getElementById("comp_name").value;
  var team_name = document.getElementById("team_name").value;
  var leader_id = document.getElementById("leader_id").value;
  var leader_name = document.getElementById("leader_name").value;
  var leader_contact = document.getElementById("leader_contact").value;
  var p1_id = document.getElementById("p1_id").value;
  var p1_name = document.getElementById("p1_name").value;
  var p2_id = document.getElementById("p2_id").value;
  var p2_name = document.getElementById("p2_name").value;

  if(!checkFields()){
    alert("Fields are not properly filled.");
    return 0;
  }

  var dataString1 = "ENAME="+event_name+"+&CNAME="+comp_name+"+&YEAR="+year+"+&TNAME="+team_name;
  var dataString2 = "+&LID="+leader_id+"+&LNAME="+leader_name+"+&LCNO="+leader_contact;
  var dataString3 = "+&P1ID="+p1_id+"+&P1NAME="+p1_name+"+&P2ID="+p2_id+"+&P2NAME="+p2_name;

  var dataString = dataString1 + "" + dataString2 + "" + dataString3;

  // console.log(dataString);

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://192.168.10.4/cms/php/register_team.php?"+dataString, true);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText.includes("error")){
        alert("Server-Side Error\nError: " + this.responseText);
        return 0;
      }
      else{
        window.alert("Team ID: " + this.responseText +"\nSave this ID for later use.");
      }
    }
  };
  xhttp.send();
} // regTeam()

function checkFields(){
  var event_name = document.getElementById("event_name").value;
  var year = document.getElementById("year").value;
  var comp_name = document.getElementById("comp_name").value;
  var team_name = document.getElementById("team_name").value;
  var leader_id = document.getElementById("leader_id").value;
  var leader_name = document.getElementById("leader_name").value;
  var leader_contact = document.getElementById("leader_contact").value;
  var p1_id = document.getElementById("p1_id").value;
  var p1_name = document.getElementById("p1_name").value;
  var p2_id = document.getElementById("p2_id").value;
  var p2_name = document.getElementById("p2_name").value;

  if(event_name == "Select Event" || comp_name == "Select Competition" || year == "" || team_name == ""
  || leader_id == "" || leader_name == "" || leader_contact == "" || (p1_id != "" && p1_name == "")
  || (p2_id != "" && p2_name == "")){
    console.log("incomplete fields");
    return 0;
  }
  else{
    console.log("complete fields");
    return 1;
  }
}// checkFields()

// keys used in GET/POST in php
  // $e_name = trim($_GET["ENAME"]);
  // $c_name = trim($_GET["CNAME"]);
  // $ce_year = intVal(trim($_GET["YEAR"]));
  // $t_name = trim($_GET["TNAME"]);
  // $l_id = trim($_GET["LID"]);
  // $l_name = trim($_GET["LNAME"]);
  // $l_contact = trim($_GET["LCNO"]);
  // $p1_id = trim($_GET["P1ID"]);
  // $p1_name = trim($_GET["P1NAME"]);
  // $p2_id = trim($_GET["P2ID"]);
  // $p2_name = trim($_GET["P2NAME"]);
