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

function checkemail() {
    var OK = true
    console.log("Checking....")
     var form = document.getElementById("evenmore")
        if (typeof(form) != HTMLFormElement) {
            console.log("Error")
            return false
            }
            var elements = form.elements
        for (var i = 0, element; element = elements[i++];) {
            if (element.type == "email") {
                email = element.value
                var result = email.search(RegExp(element.reggie,"i"))
                if (result >= 0) {
                    console.log("Yay!")
                }
                else {
                    alert("Inavid email address at:",element.parentElement)
                    OK = false
                    console.log("Nay!")
                }
                
            }
        
        } 
    
    return OK
        }
getPrevForms()