function toggleUserNavBar(){
    let panel = document.getElementById('user-nb-options');
    if (panel.style.display == 'none'){
        panel.style.display = 'block';
        document.getElementById('user-nb-toggle-b').style.transform = 'scaleY(1)';
        document.getElementById('user-panel').style.marginRight = '215px';
    }
    else{
        panel.style.display = 'none';
        document.getElementById('user-nb-toggle-b').style.transform = 'scaleY(-1)';
        document.getElementById('user-panel').style.marginRight = '0px';
    }
}