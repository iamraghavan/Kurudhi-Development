// import swal from 'sweetalert';

//Reference for form collection(3)
let formMessage = firebase.database().ref('register');
  
//listen for submit event//(1)
document
  .getElementById('registrationform')
  .addEventListener('submit', formSubmit);

//Submit form(1.2)
function formSubmit(e) {
  e.preventDefault();
  // Get Values from the DOM
  let name = document.querySelector('#id1').value;
  let email = document.querySelector('#id2').value;
  let BloodGroup = document.querySelector('#id3').value;
  let Gender = document.querySelector('#id4').value;
  let Age = document.querySelector('#id5').value;
  let ContactNumber = document.querySelector('#id6').value;
  let Address = document.querySelector('#id7').value;
  let Country = document.querySelector('#id8').value;
  let State = document.querySelector('#id9').value;
  let City = document.querySelector('#id10').value;
  let AlternativeNumber = document.querySelector('#id11').value;
  let LastDate = document.querySelector('#id12').value;
  let Area = document.querySelector('#id13').value;
  let CheckStatus = document.querySelector('#id14').value; 


  // let City = document.querySelector('#id10').value;
  
  //send message values
  sendMessage(name, email , BloodGroup, Gender, Age, ContactNumber, Address, Country, State, City, AlternativeNumber, LastDate , Area, CheckStatus );

  //Show Alert Message(5)
  document.querySelector('.alert').style.display = 'block';

  //Hide Alert Message After Seven Seconds(6)
  setTimeout(function() {
    document.querySelector('.alert').style.display = 'none';
  }, 7000);

  //Form Reset After Submission(7)
  document.getElementById('registrationform').reset();
}

//Send Message to Firebase(4)

function sendMessage(name, email , BloodGroup, Gender, Age, ContactNumber, Address, Country, State, City, 
  AlternativeNumber, LastDate , Area, CheckStatus ) {
  let newFormMessage = formMessage.push();
  newFormMessage.set({
    name: name,
    email: email,
    BloodGroup: BloodGroup,
    Gender: Gender,
    Age: Age,
    ContactNumber: ContactNumber,
    Address: Address,
    Country : Country,
    State : State,
    City: City,
    AlternativeNumber : AlternativeNumber,
    LastBloodDonatedDate : LastDate,
    Area : Area,
    CheckStatus : CheckStatus,

  })
  .then(()=>{
      // alert("Data Stored Successfully");

      swal({
title: "Good job!",
text: "Inforamation's Update Successfully!",
icon: "success",
button: "Aww yiss!"
});

  })
  .catch((error)=>{
      // swal("Unsuccessful, error" + error)

      swal({
        title: "Sorry, error: " + user.email ,
        text: "Inforamation's Update Successfully!",
        icon: "success",
        button: "Aww yiss!"
        });


  })
}



