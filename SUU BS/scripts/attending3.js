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
    for ( var form in document.forms) {
        for (var element in form) {
            if (element.type == "email") {
                var suffix = element.search(RegExp(element.reggie))
                if (suffix >= 0) {
                    console.log("Congratulations!")
                }
                else {
                    alert("Inavid email address at:",element.parentElement)
                    OK = false
                    console.log("Can't you follow basic directions?")
                }
                
            }
        }
            
    }
    return OK
}
getPrevForms()