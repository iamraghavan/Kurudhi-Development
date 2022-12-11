function SelectAllData(){
    firebase.database().ref('RequestForm').once('value', function(AllRecords){
        AllRecords.forEach(
            function(CurrentRecord){
                var name = CurrentRecord.val().name;
                var email = CurrentRecord.val().email;
                var BloodGroup = CurrentRecord.val().BloodGroup;
                
                var ContactNumber = CurrentRecord.val().ContactNumber;
                // var Address = CurrentRecord.val().Address;
                
                var AlternativeNumber = CurrentRecord.val().AlternativeNumber;
              
                var Message = CurrentRecord.val().Message;

                AddItemsToTable(name, email , BloodGroup,  ContactNumber,
                 AlternativeNumber, Message);
            }
        );
    });
}

window.onload = SelectAllData;


// Filling the Table with Firebase Database

function AddItemsToTable(name, email , BloodGroup, ContactNumber, 
    AlternativeNumber, Message){


    var tbody = document.getElementById('tbody1');
    var trow = document.createElement('tr');
    var td1 = document.createElement('td');
    var td2 = document.createElement('td');
    var td3 = document.createElement('td');
    var td4 = document.createElement('td');
    var td5 = document.createElement('td');
    var td6 = document.createElement('td');
    var td6 = document.createElement('td');






    td1.innerHTML   = name; 
    td2.innerHTML   = email;
    td3.innerHTML   = ContactNumber;
    td4.innerHTML   = AlternativeNumber;
    td5.innerHTML   = BloodGroup;
    td6.innerHTML   = Address;
    td6.innerHTML  = Message;


    trow.appendChild(td1);
    trow.appendChild(td2);
    trow.appendChild(td3);
    trow.appendChild(td4);
    trow.appendChild(td5);
    trow.appendChild(td6);
    trow.appendChild(td6);



    tbody.appendChild(trow);

}

const shareData = {
    title: 'MDN',
    text: 'Learn web development on MDN!',
    url: 'https://developer.mozilla.org'
  }
  
  const btn = document.querySelector('button');
  
  // Share must be triggered by "user activation"
  btn.addEventListener('click', async () => {
    try {
      await navigator.share(shareData);
      resultPara.textContent = 'MDN shared successfully';
    } catch (err) {
      resultPara.textContent = `Error: ${err}`;
    }
  });