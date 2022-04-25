
function provjeraPolja(){
    var ime = document.getElementById("ime");
    var prezime = document.getElementById("prezime");
    var email = document.getElementById("email");
    var lozinka = document.getElementById("lozinka");
    var lozinkaPonovi = document.getElementById("lozinkaPonovi");
    
    
  
    if (ime.value.length < 3) {  
      alert("Ime treba imati najmanje 3 znakova");  
      ime.focus();  
      return false;  
    }
  
    if (prezime.value.length < 3) {  
      alert("Prezime treba imati najmanje 3 znakova");  
      prezime.focus();  
      return false;  
    }
  
    if (email.value.length <= 0) {  
      alert("Email ne smije biti prazan");  
      email.focus();  
      return false;  
    }
    if (lozinka.value.length < 8) {  
      alert("Lozinka mora imati 8 ili više znakova");  
      lozinka.focus();  
      return false;  
    }
    if (lozinkaPonovi.value.length < 8 ){  
      alert("Ponovljena lozinka mora imati 8 ili više znakova");  
      lozinkaPonovi.focus();  
      return false;  
    }
    if (lozinka.value != lozinkaPonovi.value){
      alert("Lozinka i ponovljena lozinka moraju biti iste"); 
      lozinkaPonovi.focus();  
      return false;
    }
  }
  