
function fetchRecord(){

  var nu_id = document.getElementById("nu_id_form0").value;

  // simple field check
  if(nu_id == ""){
    alert("Enter NU-ID");
    return 0;
  }

  var dataString = "nu_id="+nu_id;

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "http://192.168.1.102/SourceCode/php/fetch_record.php?"+dataString, true);
  xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText.includes("error")){
        alert("Server-Side Error\nError: " + this.responseText);
        return 0;
      }
      else{
        var member = JSON.parse(this.responseText);

        // {"nu_id":"K173791","full_name":"Ali Faisal","gender":"Male","nu_email":"K173791@nu.edu.pk",
        //   "year_join":"2019","username":"K173791","password":"7789","team_id":"107",
        //   "role_id":"115","role_name":"Co-Head Back End Development","team_name":"Back End Team",
        //   "comm_skill":"7","tech_skill":"10","mng_skill":"9","team_player":"8"
        // }

        document.getElementById("username").value = member["username"];
        document.getElementById("password").value = member["password"];
        document.getElementById("role").value = member["role_name"];
        document.getElementById("team").value = member["team_name"];
        document.getElementById("nu_id").value = member["nu_id"];
        document.getElementById("fullname").value = member["full_name"];
        document.getElementById("gender").value = member["gender"];
        document.getElementById("email").value = member["nu_email"];
        // document.getElementById("proj_name").value = member["proj_name"];
        document.getElementById("year_joined").value = member["year_join"];
        document.getElementById("comm_score").value = member["comm_skill"];
        document.getElementById("tech_score").value = member["tech_skill"];
        document.getElementById("mng_score").value = member["mng_skill"];
        document.getElementById("team_score").value = member["team_player"];

        // since record is fetched enable the Delete Button del_btn/Update Button upd_btn
        try{
          document.getElementById("del_btn").disabled = false;
        }
        catch(err){
          console.log("not delete page");
        }

        try{
          document.getElementById("upd_btn").disabled = false;
        }
        catch(err){
          console.log("not update page");
        }
      }
    }
  };
  xhttp.send();
}
