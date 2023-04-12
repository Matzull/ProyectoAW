function toggleUserNavBar(){
    let panel = document.getElementById('user-nb-options');
    let userNavBar = document.getElementById('user-nav-bar');
    if (userNavBar.classList.contains('nb-closed')){
        userNavBar.classList.remove('nb-closed');
        document.getElementById('user-panel').classList.remove('nb-closed');
    }
    else {
        userNavBar.classList.add('nb-closed');
        document.getElementById('user-panel').classList.add('nb-closed');
    }
    // if (panel.style.height == '0px'){
    //     panel.style.height = '250px';
    //     document.getElementById('user-nb-toggle-b').style.transform = 'scaleY(1)';
    //     document.getElementById('user-panel').style.marginRight = '215px';
    // }
    // else{
    //     panel.style.height = '0px';
    //     document.getElementById('user-nb-toggle-b').style.transform = 'scaleY(-1)';
    //     document.getElementById('user-panel').style.marginRight = '0px';
    // }
}