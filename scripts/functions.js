function reload(){
    var container = document.getElementById("refresher");
    var content = container.innerHTML;
    container.innerHTML= content;
}
function popitup(url) {
    newwindow=window.open(url,'name','height=250,width=350');
    if (window.focus) {newwindow.focus()}
    return false;
}