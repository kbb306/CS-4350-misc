function getPrevForms() {
    var prevs = window.location.search
    const prevdata = new URLSearchParams(prevs)
    const myForm = prevdata.forms[0]
    current = document.getElementById("evenmore")
    for (var i = 0; i<myForm.length; i++) {
        const thing = myForm[i]
        x = document.createElement("input")
        x.setAttribute("type","hidden")}
        x.setAttribute("value",thing.value)
        current.append(x)

}

var month = getElementById("favday")
 today = new Date().getDate()
month.setAttribute("max",today)

function checkemail() {
    for ( var form in document.forms) {
        for (var element in form) {
            if (element.type == "email") {
                var suffix = element.search(element.pattern)
                if (suffix >= 0) {
                    var OK = true
                }
                else {
                    alert("Inavid email address at:",element.parentElement)
                    OK = false
                }
                return OK
            }
        }
            
    }
}
getPrevForms()