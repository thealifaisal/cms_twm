
var xhttp = new XMLHttpRequest();

xhttp.open("POST", "http://192.168.1.102/SourceCode/php/get_team_details.php", true);

xhttp.onreadystatechange = function(){

  if(this.readyState == 4 && this.status == 200){

    if(this.responseText.includes("error")){
      console.log("responseText has error echoed from server(php). Possibly die() function has executed in PHP file.");
    }
    else{
      // this.responseText is JSON format
      var team_roles = JSON.parse(this.responseText);

      // team_roles is a key-value pair ["team_id", "team_details"]
      console.log(team_roles);
      console.log(team_roles["101"]);

      document.getElementById("tab_8").innerHTML = team_roles["101"]; // Web Development
      document.getElementById("tab_3").innerHTML = team_roles["102"]; // Mobile App Development
      document.getElementById("tab_9").innerHTML = team_roles["102"]; // Mobile App Development TechCup
      document.getElementById("tab_10").innerHTML = team_roles["103"]; // Speed Programming
      document.getElementById("tab_11").innerHTML = team_roles["104"]; // UI/UX Design
      document.getElementById("tab_12").innerHTML = team_roles["105"]; // Database Design
      document.getElementById("tab_1").innerHTML = team_roles["106"]; // Front End Team
      document.getElementById("tab_2").innerHTML = team_roles["107"]; // Back End Team
      document.getElementById("tab_4").innerHTML = team_roles["108"]; // Media and Promotions Team
      document.getElementById("tab_5").innerHTML = team_roles["109"]; // Design Team
      document.getElementById("tab_6").innerHTML = team_roles["110"]; // Content Team
      document.getElementById("tab_7").innerHTML = team_roles["111"]; // Mentorship Team
      document.getElementById("tab_13").innerHTML = team_roles["112"]; // Event Management Team
    }
  }
};

xhttp.send();
