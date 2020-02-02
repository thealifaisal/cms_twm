
function delTeam(){
  var team_id = document.getElementById("team_id").value;

  if(team_id == ""){
    alert("Enter Team ID");
    return 0;
  }

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://192.168.10.4/cms/php/delete_team.php?TID="+team_id, true);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText.includes("error")){
        alert("Server-Side Error\nError: " + this.responseText);
        return 0;
      }
      else{
        alert("Success: Deleted Team No: "+team_id);
        document.getElementById("del-team-btn").disabled = true;
      }
    }
  };
  xhttp.send();
}// delTeam()
