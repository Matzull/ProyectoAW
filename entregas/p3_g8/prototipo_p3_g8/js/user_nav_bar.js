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
}