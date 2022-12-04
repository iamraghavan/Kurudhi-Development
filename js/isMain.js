function terms_changed(termsCheckBox) {
    if (termsCheckBox.checked) {
      document.getElementById("submit_button").disabled = false;
    } else {
      document.getElementById("submit_button").disabled = true;
    }
  }

  // Age Checking above 60+

  var ages = document.getElementById("id5");
  function check() {
    var nbr;
    nbr = Number(document.getElementById("id5").value);
    if (nbr > 65 || nbr >= 18) {
      // swal("You are not an adult");
    }
    else {
      swal({
        title: "Sorry Voluntary Donor ",
        text: `You are not eligible for Donate Blood !`,
        icon: "error",
        button: "Aww yiss!"
      });
    }
  }

