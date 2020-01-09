var xhttp = new XMLHttpRequest();

// use server hosted php file, otherwise below error is thrown:
// Access to XMLHttpRequest at 'file:///D:/Project/testP.php'
// from origin 'null' has been blocked by CORS policy: Cross origin requests are
// only supported for protocol schemes: http, data, chrome, chrome-extension, https.

// methods: GET/POST
// url
// Async: true, Sync: false
xhttp.open("POST", "http://192.168.1.102/SourceCode/testP.php", true);

// this.readyState == [1,2,3,4]
// function is called 4 times
xhttp.onreadystatechange = function() {

  // this.readyState == 4: request finished and response is ready
  // this.status == 200: "OK" == this.statusText
  if (this.readyState == 4 && this.status == 200) {

    // this.status is 0; ERROR
    // Because html file should also be hosted on the server like php
    /*status is 0 when your html file containing the script is opened in the
    browser via the file scheme. Make sure to place the files in your server
    (apache or tomcat whatever)
    and then open it via http protocol in the browser.
    */
    console.log(this.status);

    // response text is empty; ERROR
    // Because html file should also be hosted on the server like php
    console.log(this.responseText);

    document.getElementById("team_head").innerHTML = this.responseText;

  } // if (this.readyState == 4 && this.status == 200)
}; // function

// Sends the request to the server
xhttp.send();
