/* Kanchwala, Husain    Account:  jadrn024
 CS545, Fall 2017
 Project 3
*/

$(document).ready(function() {
   $("#logcheck").on('click' , function(e){
        e.preventDefault();
        check();
   });

});

function check() {    
  var pid = $("#passwd").val();
  console.log(pid);
  $.ajax( {
      url: "process_login.php",
      type: "post",
      data: {pass: pid},
      success: function(response) {
      if(response.startsWith("Login Successful")) {
         $('#mainpage').css('display', 'block');
          $('#login').css('display', 'none');
       }
       else {        
          $('#error').text("Invalid password");  
        }
      },
      error: function(response) {
        console.log(response)
         }
      });
}

function tabInventory(evt, tabI) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    active = document.getElementsByClassName("active");
    for (i = 0; i < active.length; i++) {
        active[i].className = active[i].className.replace("active", "tablinks");
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active", "");
    }

    document.getElementById(tabI).style.display = "block";
    evt.currentTarget.className += "active";

}
