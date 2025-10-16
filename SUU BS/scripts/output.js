function dataDump() {
    var previous = window.location.search
    var fullname = []
    var toParse = new URLSearchParams(previous)
    for (var [key,value] of toParse) {
        console.log(key,value)
        if (key.search(RegExp("name$")) > -1) {
            
            fullname.push([key,value])
        }
        else if (key == "programmer") {
            console.log("programmed by "+ value)
        }
        else if (key.search(RegExp("Check$")) > -1) {
            
        }
        else {
            place = document.getElementById(String(key))
            prefix = place.innerHTML
            place.innerHTML = String(prefix + value)
    }
  }
}
dataDump()