document.getElementById("loginForm").addEventListener("submit",(event)=>{
    event.preventDefault()
})

firebase.auth().onAuthStateChanged((user)=>{
    if(user){
        location.replace("dashboard.html")
    }
})

function login(){
    const email_data = document.getElementById("email").value;
    const password_data = document.getElementById("password").value;
    firebase.auth().signInWithEmailAndPassword(email_data, password_data)
    .catch((error)=>{
        document.getElementById("error").innerHTML = error.message
    })
}

function signUp(){
    const email = document.getElementById("email").value
    const password = document.getElementById("password").value
    firebase.auth().createUserWithEmailAndPassword(email, password)
    .catch((error) => {
        document.getElementById("error").innerHTML = error.message
    });
}

function forgotPass(){
    const email = document.getElementById("email").value
    firebase.auth().sendPasswordResetEmail(email)
    .then(() => {
        swal("Reset link sent to your email id");
    })
    .catch((error) => {
        document.getElementById("error").innerHTML = error.message
    });
}