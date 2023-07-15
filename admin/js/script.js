var Sidebar = document.getElementById("sidebar");
var btnToggle = document.getElementById("sidebarCollapse");
btnToggle.addEventListener("click", function () {
  Sidebar.classList.toggle("active");
});
