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