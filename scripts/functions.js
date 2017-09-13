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
function search() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("search-input");
  filter = input.value.toUpperCase();
  table = document.getElementById("search-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByClassName("location")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
