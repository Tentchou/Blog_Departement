let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let closeBtn2 = document.querySelector("#btn2");

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
});
closeBtn2.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
 }
}

document.getElementById('whatsapp-icon').addEventListener('click', function() {
    document.getElementById('whatsapp-info').style.display = 'block';
});

document.getElementById('close-button').addEventListener('click', function() {
    document.getElementById('whatsapp-info').style.display = 'none';
});

// Sélectionner tous les liens de navigation
const links = document.querySelectorAll('.nav-link');

// Ajouter un événement de clic sur chaque lien
links.forEach(link => {
    link.addEventListener('click', () => {
        // Enlever la classe 'active' de tous les liens
        links.forEach(l => l.classList.remove('active'));
        // Ajouter la classe 'active' au lien cliqué
        link.classList.add('active');
    });
});
