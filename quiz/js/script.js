<script>
function validateForm() {
  var y = document.forms["form"]["name"].value; 
  if (y == null || y == "") {
    document.getElementById("errormsg").innerHTML="Name must be filled out.";
    return false;
  }
  var br = document.forms["form"]["branch"].value;
  if (br == "") {
    document.getElementById("errormsg").innerHTML="Please select your branch";
    return false;
  }
  var rn = (document.forms["form"]["rollno"].value).split("/");
  if (rn.length != 3) {
    document.getElementById("errormsg").innerHTML="Incorrect Rollno. Please enter in the format (BE/10XXX/YY)";
    return false;
  }
  if((rn[0].length != 2 && rn[0].length != 3) || (rn[0].match(/[A-Z]/g)).length != rn[0].length){
    document.getElementById("errormsg").innerHTML="Incorrect Rollno "+rn[0]+". Make sure all letters are capital (Ex. 'BE' in BE/10XXX/YY)";
    return false;
  }
  if(rn[1].length != 5 || (rn[1].match(/[0-9]/g)).length != rn[1].length){
    document.getElementById("errormsg").innerHTML="Incorrect Rollno "+rn[1];
    return false;
  }
  if(rn[2] != "12" && rn[2] != "13" && rn[2] != "14" && rn[2] != "15" && rn[2] != "16"){
    document.getElementById("errormsg").innerHTML="Incorrect Rollno "+rn[2];
    return false;
  }
  var g = document.forms["form"]["gender"].value;
  if (g=="") {
    document.getElementById("errormsg").innerHTML="Please select your gender";
    return false;
  }
  var x = document.forms["form"]["username"].value;
  if (x.length == 0) {
    document.getElementById("errormsg").innerHTML="Please enter a valid username";
    return false;
  }
  if (x.length < 4) {
    document.getElementById("errormsg").innerHTML="Username must be at least 4 characters long";
    return false;
  }
  var m = document.forms["form"]["phno"].value;
  if (m.length != 10) {
    document.getElementById("errormsg").innerHTML="Phone number must be 10 digits long";
    return false;
  }
  var a = document.forms["form"]["password"].value;
  if(a == null || a == ""){
    document.getElementById("errormsg").innerHTML="Password must be filled out";
    return false;
  }
  if(a.length<5 || a.length>15){
    document.getElementById("errormsg").innerHTML="Passwords must be 5 to 15 characters long.";
    return false;
  }
  var b = document.forms["form"]["cpassword"].value;
  if (a!=b){
    document.getElementById("errormsg").innerHTML="Passwords must match.";
    return false;
  }
}
</script>