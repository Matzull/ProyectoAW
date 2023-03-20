function toggleDropdownHamburger(){
    let panel = document.getElementById('nav-bar-dropdown-h');
    if (panel.style.display == 'block'){
        panel.style.display = 'none';
        document.getElementById('nav-bar-hamburger-b').innerHTML = '=';
    }
    else{
        panel.style.display = 'block';
        document.getElementById('nav-bar-hamburger-b').innerHTML = '+';
    }
}