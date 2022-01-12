const navSlide = ()=>
{
    const mobile = document.querySelector('.mobile');
    const nav = document.querySelector('.navlinks');
    const navLinks = document.querySelectorAll('.navlinks li');
  
  
  
    mobile.addEventListener('click', () =>
    {
        //toggle Navigation
      nav.classList.toggle('nav-active');

      //animate navigation links
      navLinks.forEach((link, index) =>
      {
        if(link.style.animation)
        {
           link.style.animation = '';
        } 
        else
        {
            link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.7}s`;
        }
      });
    });
}

navSlide();

      /*signup and login switching function*/
        var x=document.getElementById("login");
        var y=document.getElementById("register");
        var z=document.getElementById("btn");
        function register()
        {
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function login()
        {
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0px";
        }
       
   
 
