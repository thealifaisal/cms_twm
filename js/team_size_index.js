
var xhttp = new XMLHttpRequest();

xhttp.open("POST", "http://192.168.1.102/SourceCode/php/calculate_teamsize.php", true);

xhttp.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200){
    if(this.responseText.includes("error")){
      console.log("responseText has error echoed from server(php). Possibly die() function has executed in PHP file.");
    }
    else{
      // this.responseText is in JSON format
      var counts = JSON.parse(this.responseText);

      // counts is key-value pair list ["role or team": "count"]
      console.log(counts);
      console.log(counts["head"]);

      document.getElementById("team_head").innerHTML = counts["head"]; //1
      document.getElementById("co_head").innerHTML = counts["cohead"]; //2
      document.getElementById("proj_mgr").innerHTML = counts["proj_mgr"]; //3
      document.getElementById("frontend_dev").innerHTML = counts["frontdev"]; //4
      document.getElementById("backend_dev").innerHTML = counts["backdev"]; //5
      document.getElementById("app_dev").innerHTML = counts["appdev"]; //6
      document.getElementById("mentor").innerHTML = counts["mentor"]; //7
      document.getElementById("mnp").innerHTML = counts["mnp"]; //8
      document.getElementById("designer").innerHTML = counts["design"]; //9
      document.getElementById("content_writer").innerHTML = counts["content"]; //10
      document.getElementById("event_mgr").innerHTML = counts["event"]; //11
      document.getElementById("learner").innerHTML = counts["learner"]; //12
    }
  }
};
xhttp.send();
