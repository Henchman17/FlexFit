const toggleSidebar = document.getElementById('toggle-sidebar');
const sidebar = document.getElementById('sidebar');

window.addEventListener('load', function() {
  if (window.innerWidth <= 768) {
    document.body.classList.add('sidebar-collapsed');
  }
});


toggleSidebar.addEventListener('click', () => {
  sidebar.classList.toggle('hidden');
});

