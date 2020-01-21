
// keys
// $team_id = intVal(trim($_GET["TID"]));

function fetchTeam(){
  var team_id = document.getElementById("team_id").value;

  if(team_id == ""){
    alert("Enter Team ID");
    return 0;
  }

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://192.168.1.102/SourceCode/php/fetch_team.php?TID="+team_id, true);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText.includes("error")){
        alert("Server-Side Error\nError: " + this.responseText);
        return 0;
      }
      else{
        // if the team exists
        var data = JSON.parse(this.responseText);
        // model data in JSON (this.responseText)
        // {"members":[{"p_id":"K173791","p_name":"Ali Faisal","p_cno":"0345-1248906"},{"p_id":"K173810","p_name":"Aiman Siddiqui","p_cno":"0"}],
        // "team_name":"hackers","solved_prob":"0","total_prob":"0","comp_name":"Web Development","event_name":"Tech Cup","event_year":"2020"}

        var members = data["members"];
        var team_name = data["team_name"];
        var solved_prob = data["solved_prob"];
        var total_prob = data["total_prob"];
        var comp_name = data["comp_name"];
        var event_name = data["event_name"];
        var event_year = data["event_year"];

        var l_id, l_name, l_cno, p_id = [], p_name = [];

        for(var i=0; i<members.length; i++){
          var id = members[i.toString()]["p_id"];
          var name = members[i.toString()]["p_name"];
          var cno = members[i.toString()]["p_cno"];

          if(cno != "0"){
            // leader
            l_id = id;
            l_name = name;
            l_cno = cno;
          }
          else{
            p_id.push(id);
            p_name.push(name);
          }
        }

        // element id`s
          // team_id
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
          // solved_prob
          // total_prob

        document.getElementById("event_name").value = event_name;
        document.getElementById("year").value = event_year;
        document.getElementById("comp_name").value = comp_name;
        document.getElementById("team_name").value = team_name;
        document.getElementById("leader_id").value = l_id;
        document.getElementById("leader_name").value = l_name;
        document.getElementById("leader_contact").value = l_cno;
        document.getElementById("total_prob").value = total_prob;
        document.getElementById("solved_prob").value = solved_prob;

        for(var i=0; i<p_id.length; i++){
          document.getElementById("p"+(i+1)+"_id").value = p_id[i];
          document.getElementById("p"+(i+1)+"_name").value = p_name[i];
        }
      }
    }
  };
  xhttp.send();
}// fetchTeam()


function delTeam(){
  var team_id = document.getElementById("team_id").value;

  if(team_id == ""){
    alert("Enter Team ID");
    return 0;
  }

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://192.168.1.100/SourceCode/php/delete_team.php?TID="+team_id, true);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText.includes("error")){
        alert("Server-Side Error\nError: " + this.responseText);
        return 0;
      }
      else{
        alert("Success: Deleted Team No: "+team_id);
      }
    }
  };
  xhttp.send();
}// delTeam
