function dataDump() {
    var previous = window.location.search
    var fullname = []
    var toParse = new URLSearchParams(previous)
    for (var [key,value] of toParse) {
        //console.log(key,value)
        if (key.search(RegExp("name$")) > -1) {
            
            fullname.push(value)
        }
        else if (key == "programmer") {
            console.log("programmed by "+ value)
        }
        else if (key.search(RegExp("Check$")) > -1) {
            if (value == "on") {
                place = document.getElementById(String(key))
                prefix = place.innerHTML
                place.innerHTML = prefix + " Check"
            }
        }
        else {
            place = document.getElementById(String(key))
            prefix = place.innerHTML
            place.innerHTML = String(prefix + " "+value)
    }
  }
  console.log(fullname)
  place = document.getElementById("name")
  prefix = place.innerHTML
  place.innerHTML = String(prefix + " "+fullname[0]+" "+fullname[1])
}
dataDump()