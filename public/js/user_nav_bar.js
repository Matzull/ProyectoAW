function toggleUserNavBar(){
    let panel = document.getElementById('user-nb-options');
    if (panel.style.height == '0px'){
        panel.style.height = '250px';
        document.getElementById('user-nb-toggle-b').style.transform = 'scaleY(1)';
        document.getElementById('user-panel').style.marginRight = '215px';
    }
    else{
        panel.style.height = '0px';
        document.getElementById('user-nb-toggle-b').style.transform = 'scaleY(-1)';
        document.getElementById('user-panel').style.marginRight = '0px';
    }
}