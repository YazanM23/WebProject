let a = 0;
function openMessage(n){
    if(a == 0){
        document.getElementById('messageContent'+n).style.display = 'block';
        a = 1;
    }
    else {
        document.getElementById('messageContent'+n).style.display = 'none';
        a = 0;
    }
}
