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
    var elements = form.elements
    for (var i = 0, element; element = elements[i++];) {
        if (element.type == "label") {
             var input = element.child
        }
        else {
            input = element
        }
        if (input.type == "email") {
            email = input.value
            var result = email.search(RegExp(element.reggie,"i"))
            console.log(result)
                if (result == -1) {
                    console.log("No Match!")
                    OK = false
                }

                else {
                    console.log("Match!")
                }
        }
    }
    return OK
}
       
getPrevForms()