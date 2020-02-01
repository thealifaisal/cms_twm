
function updateRecord(){

  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var role = document.getElementById("role").value;
  var team = document.getElementById("team").value;
  var nu_id = document.getElementById("nu_id").value;
  var fullname = document.getElementById("fullname").value;
  var gender = document.getElementById("gender").value;
  var email = document.getElementById("email").value;
  // var proj_name = document.getElementById("proj_name").value;
  var year_joined = document.getElementById("year_joined").value;
  var comm_score = document.getElementById("comm_score").value;
  var tech_score = document.getElementById("tech_score").value;
  var mng_score = document.getElementById("mng_score").value;
  var team_score = document.getElementById("team_score").value;

  // simple field check
  if(username == "" || password == "" || nu_id == "" || fullname == "" ||
    gender == "Select Gender" || email == "" || year_joined == "" || role == "Select Role" ||
    comm_score == "" || tech_score == "" || mng_score == "" || team_score == ""){
    alert("Enter Member Data");
    return 0;
  }

  // check if faculty or excom or learner, then team will be null
  if(role.includes("Faculty") || role.includes("President") || role == "General Secretary" || role == "Learner"){

    team = "";

    // check if faculty, then their skills will not be entered
    if(role.includes("Faculty")){
      var comm_score = -1;
      var tech_score = -1;
      var mng_score = -1;
      var team_score = -1;
    }

  }
  else{
    // for every role there will be a team
    if(team == "Select Team"){
      alert("Since The Member Is Non-Faculty, Non-ExComm, Non-Learner\nSelect A Team");
      return 0;
    }
  }

  if(username != nu_id){
    alert("Username will be same as NU-ID");
    return 0;
  }

  var dataString1 = "username="+username+"+&password="+password+"+&role="+role;
  var dataString2 = "+&team="+team+"+&nu_id="+nu_id+"+&fullname="+fullname;
  var dataString3 = "+&gender="+gender+"+&email="+email/*+"+&proj_name="+proj_name*/;
  var dataString4 = "+&year_joined="+year_joined+"+&comm_score="+comm_score+"+&tech_score="+tech_score;
  var dataString5 = "+&mng_score="+mng_score+"+&team_score="+team_score;

  var dataString = dataString1+""+dataString2+""+dataString3+""+dataString4+""+dataString5;

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://192.168.1.102/SourceCode/php/update_record.php?"+dataString, true);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText.includes("error")){
        alert("Server-Side Error\nError: " + this.responseText);
        return 0;
      }
      else{
        if(this.responseText == "1"){
          alert("Member Succesfully Updated");
          document.getElementById("upd_btn").disabled = true;
          return 0;
        }
        else{
          alert("Member Not Updated");
          return 0;
        }
      }
    }
  };
  xhttp.send();
}
