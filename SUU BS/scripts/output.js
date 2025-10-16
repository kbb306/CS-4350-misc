function dataDump() {
    var previous = window.location.search
    var toParse = new URLSearchParams(previous)
    for (var [key,value] of toParse) {
        place = document.getElementById(String(key))
        console.log(place.id,key,value)
        prefix = place.innerHTML
        place.innerHTML = String(prefix + value)
    }
}
dataDump()