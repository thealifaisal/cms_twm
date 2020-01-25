
function fetch_results(){

  var team_id = document.getElementById("team_id").value;
  var round_name = document.getElementById("round_name_form0").value;

  if(team_id == "" || round_name == "Select Round"){
    alert("Check Fields!");
    return 0;
  }

  var dataString = "TID="+team_id+"+&RNAME="+round_name;

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://192.168.1.102/SourceCode/php/fetch_manage_results.php?"+dataString, true);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText.includes("error")){
        alert("SERVER-SIDE ERROR\nERROR: " + this.responseText);
        return 0;
      }
      else{
        var data = JSON.parse(this.responseText);
        // model data in json encoded format
        // {"compevent_id":"3",
        //   "event_year":"2020","event_name":"Tech Cup","comp_name":"Speed Programming",
        //   "team_name":"Webster","round_name":"Round 1",
        //   "leader_id":"K173791","leader_name":"Ali Faisal","leader_no":"03451248906",
        //   "solved_prob":"0","total_prob":"0"}

        // element ids
        // event_name_form1, comp_name_form1, year_form1, team_name, round_name_form1
        // leader_id, leader_name, leader_cno, solved_prob, total_prob
        document.getElementById("event_name_form1").value = data["event_name"];
        document.getElementById("comp_name_form1").value = data["comp_name"];
        document.getElementById("year_form1").value = data["event_year"];
        document.getElementById("team_name").value = data["team_name"];
        document.getElementById("round_name_form1").value = data["round_name"];
        document.getElementById("leader_id").value = data["leader_id"];
        document.getElementById("leader_name").value = data["leader_name"];
        document.getElementById("leader_cno").value = data["leader_no"];
        document.getElementById("solved_prob").value = data["solved_prob"];
        document.getElementById("total_prob").value = data["total_prob"];

        document.getElementById("submit_score").disabled = false;
      }
    }
  };
  xhttp.send();
}

function update_results(){
  var team_id = document.getElementById("team_id").value;
  var round_name = document.getElementById("round_name_form0").value;

  if(team_id == "" || round_name == "Select Round"){
    alert("Check Fields!");
    return 0;
  }

  var solved_prob = document.getElementById("solved_prob").value;
  var total_prob = document.getElementById("total_prob").value;

  if(total_prob < solved_prob){
    alert("Total Problems < Solved Problems !\nTotal Problems: "+total_prob+"\nSolved Problems: "+solved_prob);
    return 0;
  }

  var dataString = "TID="+team_id+"+&RNAME="+round_name+"+&TP="+total_prob+"+&SP="+solved_prob;

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://192.168.1.102/SourceCode/php/update_score.php?"+dataString, true);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText.includes("error")){
        alert("SERVER-SIDE ERROR\nERROR: " + this.responseText);
        return 0;
      }
      else{
        if(this.responseText.includes("success")){
          document.getElementById("submit_score").disabled = true;
          alert("Update Successful!");
          return 0;
        }
      }
    }
  };
  xhttp.send();
}
