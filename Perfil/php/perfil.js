function showInfo(event) {
    event.preventDefault();
    var infoDiv = document.getElementById('info');
    var contatosDiv = document.getElementById('contatos');
    infoDiv.style.display = 'block';
    contatosDiv.style.display = 'none';
  
    ScrollReveal().reveal('#info', { duration: 800, origin: 'left', distance: '30px' });
    
    // Garantir que 'Contatos' seja ocultado ao clicar em 'Info'
    ScrollReveal().clean('#contatos');
    contatosDiv.style.display = 'none';
  }
  
  function showContato(event) {
    event.preventDefault();
    var infoDiv = document.getElementById('info');
    var contatosDiv = document.getElementById('contatos');
    infoDiv.style.display = 'none';
    contatosDiv.style.display = 'block';
  
    ScrollReveal().reveal('#contatos', {  duration: 800, origin: 'right', distance: '30px' });
    
    // Garantir que 'Info' seja ocultado ao clicar em 'Contatos'
    ScrollReveal().clean('#info');
    infoDiv.style.display = 'none';
  }
  

  

  function menuToggle() {
    const toggleMenu = document.querySelector(".popup");
    toggleMenu.classList.toggle("active");
  }

  var lastScrollTop = 0;
  var navbar = document.getElementById("navbar");

  window.addEventListener("scroll", function() {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
      navbar.style.top = "-80px";

      // Desativa o popup quando o usuário mexer para baixo
      const toggleMenu = document.querySelector(".popup");
      if (toggleMenu.classList.contains("active")) {
        menuToggle(); // Chama a função para fechar o popup
      }
    } else {
      navbar.style.top = "0";
    }

    lastScrollTop = scrollTop;
  });
