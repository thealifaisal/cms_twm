
 function getTeamDet(){

   var team_name = document.getElementById("team_name").value;

   if(team_name == "Select Team"){
     return 0;
   }

   var xhttp = new XMLHttpRequest();
   xhttp.open("POST", "http://192.168.1.102/SourceCode/php/twm_team_details.php?TNAME="+team_name, true);
   xhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
       if(this.responseText.includes("error")){
         alert("Server-Side Error\nError: " + this.responseText);
         return 0;
       }
       else{
         document.getElementById("team_details").value = this.responseText;
       }
     }
   };
   xhttp.send();
 }

 function updateTeamDet(){
   var team_name = document.getElementById("team_name").value;
   var team_details = document.getElementById("team_details").value;

   if(team_name == "Select Team"){
     alert("Select A Team");
     return 0;
   }

   var xhttp = new XMLHttpRequest();
   xhttp.open("POST", "http://192.168.1.102/SourceCode/php/upd_twm_team_details.php?TNAME="+team_name+"+&TDET="+team_details, true);
   xhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
       if(this.responseText.includes("error")){
         alert("Server-Side Error\nError: " + this.responseText);
         return 0;
       }
       else{
         alert("Update Successfull");
         return 0;
       }
     }
   };
   xhttp.send();
 }
