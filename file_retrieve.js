// Create a reference with an initial file path and name
var storage = firebase.storage();
var pathReference = storage.ref('profile_pictures/');

// Create a reference from a Google Cloud Storage URI
var gsReference = storage.refFromURL('gs://profile-building.appspot.com/check.png')

// Create a reference from an HTTPS URL
// Note that in the URL, characters are URL escaped!
//var httpsReference = storage.refFromURL('https://firebasestorage.googleapis.com/b/bucket/o/images%20stars.jpg');
  // The user's ID, unique to the Firebase project. Do NOT use
                   // this value to authenticate with your backend server, if
                   // you have one. Use User.getToken() instead.
const urlParams = new URLSearchParams(window.location.search);
const uid = urlParams.get('username');
console.log(uid)

storage.ref("profile_pictures/").child(uid).getDownloadURL().then(function(url) {
  // `url` is the download URL for 'images/stars.jpg'

  // This can be downloaded directly:
  var xhr = new XMLHttpRequest();
  xhr.responseType = 'blob';
  xhr.onload = function(event) {
    var blob = xhr.response;
  };
  xhr.open('GET', url);
  xhr.send();

  // Or inserted into an <img> element:
  var img = document.getElementById('myimg');
  img.src = url;

}).catch(function(error) {
  // Handle any errors
});
