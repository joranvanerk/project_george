// Disable error pop-up after clicking on it.
function disableMessage() {
  var x = document.getElementById("errorMessage");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

// var triggerTabList = [].slice.call(document.querySelectorAll('#reservationtabs a'))
// triggerTabList.forEach(function (triggerEl) {
//   var tabTrigger = new bootstrap.Tab(triggerEl)

//   triggerEl.addEventListener('click', function (event) {
//     event.preventDefault()
//     tabTrigger.show()
//   })
// })

// var triggerMon = document.querySelector('#reservationtabs a[href="#monday"]')
// bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
// var triggerTue = document.querySelector('#reservationtabs a[href="#tuesday"]')
// bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
// var triggerWed = document.querySelector('#reservationtabs a[href="#wednesday"]')
// bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
// var triggerThu = document.querySelector('#reservationtabs a[href="#thursday"]')
// bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
// var triggerFri = document.querySelector('#reservationtabs a[href="#friday"]')
// bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name