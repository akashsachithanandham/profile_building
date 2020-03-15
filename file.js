document.getElementById("but").onclick=function(){
var user = firebase.auth().currentUser;
var uid;

if (user != null) {
  
  uid = user.uid;  // The user's ID, unique to the Firebase project. Do NOT use
                   // this value to authenticate with your backend server, if
                   // you have one. Use User.getToken() instead.
}



var input=document.getElementById("imgInp");
    if (input.files && input.files[0]) {
  var file = input.files[0];
    console.log(file);
    //file.name= uid;
    var task=firebase.storage().ref("profile_pictures/").child(uid).put(file);
    
   task.then(function(){
       console.log("done");
       window.location = "bulma.php?username="+uid;
   });
}
}