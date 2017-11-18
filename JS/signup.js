 // Kanchwala, Husain    Account:  jadrn024
 // CS545, Fall 2017
 // Project 3

var imgre = /^[a-zA-Z0-9_.-]*$/;
var numre = /^[1-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/;
var pnumre = /^\d{3}-\d{3}-\d{4}$/;
var emailre = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
var size;

$(document).ready(function() {

   $( "#dateofbirth" ).datepicker();

   $("#pNIR").on('click' , function(e){
      if(!validateForm()){    
        e.preventDefault();
      }else{
        e.preventDefault();
        send_file();
        var params = "email="+$('#email').val();
        var url = "check_dup.php?"+params;
        $.get(url, dup_handler);
      }
   });

   $("#photograph").change(function () {
    size = this.files[0].size;
    readURL(this,"#amyImg");
   });

   $("#pClear").on("click", function() {
        // send_file();
    // Clear();
   }); 


});

function dup_handler(response) {
    if(response == "dup")
        $('#status').text("ERROR, duplicate");
    else if(response == "OK") {
        // upload(document.getElementById("photograph")); 
         $("#formsu").serialize();
         $("#formsu").submit();
        }
    else
        alert(response);
}

function readURL(input,tagName) {
    if (input.files && input.files[0]) {   
        var reader = new FileReader();
        reader.onload = function (e) {
            $(tagName)
            .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
    else{
        $(tagName).attr('src', "/~jadrn024/proj2/Images/jjjcasnlscnalkn.png");
    }
}

function validateForm(){
    var validated="true";

    $("#uf").text(""); 

    $("#pin").attr('class', 'inp');
    $("#pi").text(""); 

    $("#email").attr('class', 'inp');
    $("#em").text(""); 

    $("#pp").text("");
    $("#pphone").attr('class', 'inp');

    $("#firstname").attr('class', 'inp');
    $("#fn").text("");      

    $("#medicalcondition").attr('class', 'inp');
    $("#mc").text("");      

    $("#el").text("");      
 
    $("#ca").text("");      


    if(!document.getElementById('expert').checked && !document.getElementById('experienced').checked && !document.getElementById('novice').checked) {
      validated="false";
      $("#el").text(" Experience is mandatory");      
    }

    if(!document.getElementById('teen').checked && !document.getElementById('adult').checked && !document.getElementById('senior').checked) {
      validated="false";
      $("#ca").text(" Category is mandatory");      
    }

    if($("#medicalcondition").val()==""){
      $("#medicalcondition").focus(); 
      validated="false";
      $("#medicalcondition").attr('class', 'inpe');
      $("#mc").text(" Medical condition is mandatory");      
    }

    if($("#photograph").val()==""){
        validated="false";
        $("#uf").text(" Image is mandatory");      
     }else if(!getfilename($("#photograph").val()).match(/(?:gif|jpg|png|bmp|jpeg)$/) ){
        validated="false";
        $("#uf").text(" File should be of image type ");      
     }else if(getfilename($("#photograph").val()).length>40){
         validated="false";
         $("#uf").text(" Image name length should be less than 40 characters ");      
     }else if( !imgre.test(getfilename($("#photograph").val())) ){
         validated="false";
         $("#uf").text(" Image name acceptable characters are a-zA-Z0-9_.- ");      
     }

    if(!emailre.test($("#email").val())){
      $("#email").focus(); 
      validated="false";
      $("#email").attr('class', 'inpe');
      $("#em").text(" Invalid email");      
    }

    if(!pnumre.test($("#pphone").val())){
      $("#pphone").focus(); 
      validated="false";
      $("#pphone").attr('class', 'inpe');
      $("#pp").text(" Phone format 111-222-3333");      
    }

    if(!numre.test($("#pin").val()) && $("#pin").val()!=""){
      $("#pin").focus(); 
      validated="false";
      $("#pin").attr('class', 'inpe');
      $("#pi").text(" pin must be a number");      
    }

    if($("#firstname").val()==""){
      $("#firstname").focus(); 
      validated="false";
      $("#firstname").attr('class', 'inpe');
      $("#fn").text(" First name is mandatory");      
    }
    
      console.log(validated)

    if(validated=="false"){
      console.log(validated)
      return false;
    }else{
      console.log(validated)
      return true;
    }

}

function makesrc(imgName){
    var path="/~jadrn024/proj2/Images/";
    return path.concat(imgName);
}

function getfilename(filepath){
    if (filepath) {
        var startIndex = (filepath.indexOf('\\') >= 0 ? filepath.lastIndexOf('\\') : filepath.lastIndexOf('/'));
        var filename = filepath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
        return filename;
    }

} 

function Clear() { 
 $("#firstname").val("");
 $("#mname").val("");
 $("#lname").val("");
 $("#address1").val("");
 $("#address2").val("");
 $("#city").val("");
 $("#pin").val("");
 $("#pphone").val("");
 $("#email").val("");
 $("#dateofbirth").val("");
 $("#medicalcondition").val("");
 $("#filename").val("");

 $("#firstname").attr('class', 'inp');
 $("#pin").attr('class', 'inp');
 $("#pphone").attr('class', 'inp');
 $("#email").attr('class', 'inp');
 $("#medicalcondition").attr('class', 'inp');

 $("#fn").text("");
 $("#mn").text("");
 $("#ln").text("");
 $("#ad1").text("");
 $("#ad2").text("");
 $("#ci").text("");
 $("#pi").text("");
 $("#pp").text("");
 $("#em").text("");
 $("#dob").text("");
 $("#mc").text("");
 $("#uf").text("");
 $("#ca").text("");
 $("#el").text("");

 $('#amyImg').attr('src', "/~jadrn024/proj2/Images/jjjcasnlscnalkn.png");
}

var client = new XMLHttpRequest();

function send_file() {    
  var form_data = new FormData($('form')[0]);
  if(size > 2000000) {
      $('#status').html("ERROR, image is too big");
      return;
  }
  form_data.append("image", document.getElementById("photograph").files[0]);
  $.ajax( {
      url: "ajax_file_upload.php",
      type: "post",
      data: form_data,
      processData: false,
      contentType: false,
      success: function(response) {
      if(response.startsWith("Success")) {
       }
       else {        
         $('#status').css('color','red');
         $('#status').html(response);
        }
      },
      error: function(response) {
        $('#status').css('color','red');
        $('#status').html("Sorry, an upload error occurred, 2MB maximum size");
      }
      });
}

function upload(file) 
{
  // var form_data = new FormData($('form')[0]);
  var file_name = $('#photograph').val();
  if(size > 2000000) {
    $('#status').html("ERROR, image is too big");
    return;
  }
  var formData = new FormData();
  formData.append("image", file.files[0]);
  console.log("yes came here 111111111111111");
  client.open("post", "ajax_file_upload.php", true);
  client.setRequestHeader("Content-Type", "multipart/form-data");
  client.send(formData);  /* Send to server */ 
}

client.onreadystatechange = function() 
{
  if (client.readyState == 4 && client.status == 200) 
  {
     console.log("yes came here 22222222222");
      if(client.responseText=="NotAuthorised"){
          window.location = "http://jadran.sdsu.edu/perl/jadrn018/logout.cgi";    
      }
      else{       
    }
}
}
