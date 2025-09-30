function getPrevForms() {
    var prevs = window.location.search
    const prevdata = new URLSearchParams(prevs)
    const myForm = prevdata.forms[0]
    for (var i = 0; i<myForm.length; i++) {
        const thing = myForm[i]
        }
}