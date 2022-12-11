function SelectAllData(){
    firebase.database().ref('register').once('value', function(AllRecords){
        AllRecords.forEach(
            function(CurrentRecord){
                var name = CurrentRecord.val().name;
                var email = CurrentRecord.val().email;
                var BloodGroup = CurrentRecord.val().BloodGroup;
                var Gender = CurrentRecord.val().Gender;
                var Age = CurrentRecord.val().Age;
                var ContactNumber = CurrentRecord.val().ContactNumber;
                var Address = CurrentRecord.val().Address;
                var Country = CurrentRecord.val().Country;
                var State = CurrentRecord.val().State;
                var City = CurrentRecord.val().City;
                var AlternativeNumber = CurrentRecord.val().AlternativeNumber;
                var LastDate = CurrentRecord.val().LastBloodDonatedDate;
                var Area = CurrentRecord.val().Area;
                var CheckStatus = CurrentRecord.val().CheckStatus;

                AddItemsToTable(name, email , BloodGroup, Gender, Age, ContactNumber, Address, Country, State, City,
                 AlternativeNumber, LastDate , Area, CheckStatus);
            }
        );
    });
}

window.onload = SelectAllData;


// Filling the Table with Firebase Database

function AddItemsToTable(name, email , BloodGroup, Gender, Age, ContactNumber, Address, 
    Country, State, City, AlternativeNumber, LastDate , Area, CheckStatus){


    var tbody = document.getElementById('tbody1');
    var trow = document.createElement('tr');
    var td1 = document.createElement('td');
    var td2 = document.createElement('td');
    var td3 = document.createElement('td');
    var td4 = document.createElement('td');
    var td5 = document.createElement('td');
    var td6 = document.createElement('td');
    var td7 = document.createElement('td');
    var td8 = document.createElement('td');
    var td9 = document.createElement('td');
    var td10 = document.createElement('td');
    var td11 = document.createElement('td');
    var td12 = document.createElement('td');
    var td13 = document.createElement('td');
    var td14 = document.createElement('td');





    td1.innerHTML   = name; 
    td2.innerHTML   = email;
    td3.innerHTML   = Gender;
    td4.innerHTML   = Age;
    td5.innerHTML   = ContactNumber;
    td6.innerHTML   = AlternativeNumber;
    td7.innerHTML   = BloodGroup;
    td8.innerHTML   = LastDate;
    td9.innerHTML   = Address;
    td10.innerHTML  = Country;
    td11.innerHTML  = State;
    td12.innerHTML  = City;
    td13.innerHTML  = Area; 
    td14.innerHTML  = CheckStatus;


    trow.appendChild(td1);
    trow.appendChild(td2);
    trow.appendChild(td3);
    trow.appendChild(td4);
    trow.appendChild(td5);
    trow.appendChild(td6);
    trow.appendChild(td7);
    trow.appendChild(td8);
    trow.appendChild(td9);
    trow.appendChild(td10);
    trow.appendChild(td11);
    trow.appendChild(td12);
    trow.appendChild(td13);
    trow.appendChild(td14);


    tbody.appendChild(trow);

}


// const table = document.getElementById("table1");

// const tr = table.getElementsByTagName("tr");

// function SearchData() {

//   var BloodGroup = document.getElementById("CategorySelect").value.toUpperCase();
//   var country = document.getElementById("CountrySelect").value.toUpperCase();
//   var state = document.getElementById("StateSelect").value.toUpperCase();
//   var city = document.getElementById("CitySelect").value.toUpperCase();

//   for (i = 1; i < tr.length; i++) {

//     var rowName = tr[i].getElementsByTagName("td")[0].textContent.toUpperCase();
//     var rowCountry = tr[i].getElementsByTagName("td")[1].textContent.toUpperCase();
//     var rowState = tr[i].getElementsByTagName("td")[2].textContent.toUpperCase();
//     var rowCity = tr[i].getElementsByTagName("td")[3].textContent.toUpperCase();

//     var isDiplay = true;

//     if (BloodGroup != 'ALL' && rowName != BloodGroup) {
//       isDiplay = false;
//     }
//     if (country != 'ALL' && rowCountry != country) {
//       isDiplay = false;
//     }
//     if (state != 'ALL' && rowState != state) {
//       isDiplay = false;
//     }
//     if (city != 'ALL' && rowCity != city) {
//       isDiplay = false;
//     }
    
//     if (isDiplay) {
//       tr[i].style.display = "";
//     } else {
//       tr[i].style.display = "none";
//     }


//   }
// }