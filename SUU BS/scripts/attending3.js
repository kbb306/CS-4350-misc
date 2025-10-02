function getPrevForms() {
    var prevs = window.location.search
    const prevdata = new URLSearchParams(prevs)
    form = document.getElementById("evenmore")
    for(var [key,value] of prevdata) {
        entry = document.createElement("input")
        entry.setAttribute("type","hidden")
        entry.setAttribute("name",key)
        entry.setAttribute("value",value)
        form.appendChild(entry)
        
    }

}

var day = document.getElementById("favday")
var today = new Date()
console.log(today)
day.setAttribute("max",today.getDate())

function check() {
   var thing = Array.from(document.getElementsByTagName("input"))
   for (i in thing) {
    input = thing[i]
    var OK = true
    var result = 0
    if (input.type == "email") {
        if (input.id == "schoolmail") {
            result = input.value.search(/.edu$/)
        }
        else if (input.id == "personalmail") {
            result = input.value.search(/.*\.(?!edu$)/)
            
        }
        if (result == -1) {
            alert("Invalid input at "+(input.parentElement.innerHTML.split("<"))[0])
            OK = false
            console.log("No match.")
        }
        else {
            console.log("Match!")
        }
        
    }
    else {
        if (!input.value) {
            alert("Invalid input at "+(input.parentElement.innerHTML.split("<"))[0])
            OK = false
        }
        }
    }
    return OK
   }
   

       
getPrevForms()