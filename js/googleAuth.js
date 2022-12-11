function handleCredentialResponse(response) {
  var decodedToken = jwt_decode(response.credential);
  const googleName = decodedToken.name;
  const googleMail = decodedToken.email;
  const googlePicture = decodedToken.picture;

  ((displayProfileName, displayProfileMail, dispalyProfilePicture) => {
    console.log(dispalyProfilePicture);

    var userPic = document.getElementById("userProfile");
    userPic.src = dispalyProfilePicture;

    var gusername = document.getElementById("username");
    gusername.innerHTML = displayProfileName;

    var gmail = document.getElementById("usermail");
    gmail.innerHTML = displayProfileMail;
  })(googleName, googleMail, googlePicture);
}



