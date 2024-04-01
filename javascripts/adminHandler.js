function manageContent(d){
    let donor = document.getElementById('donor').style.display = "none";
    let recipient = document.getElementById('recipient').style.display = "none";
    let doctor = document.getElementById('doctor').style.display = "none";
    let hospital = document.getElementById('hospital').style.display = "none";
    let surgery = document.getElementById('surgery').style.display = "none";
    let test = document.getElementById('test').style.display = "none";
    let schedule = document.getElementById('schedule').style.display = "none";

    //end of setting the initial state
    if(d == 0){
        let donor = document.getElementById('donor').style.display = "block";
    }
    else if(d == 1){
        let recipient = document.getElementById('recipient').style.display = "block";
    }
    else if(d == 2){
        let doctor = document.getElementById('doctor').style.display = "block";
    }
    else if(d == 3){
        let hospital = document.getElementById('hospital').style.display = "block";

    }
    else if(d == 4){
        let surgery = document.getElementById('surgery').style.display = "block";

    }
    else if(d == 5){
        let test = document.getElementById('test').style.display = "block";

    }
    else if(d == 6){
        let schedule = document.getElementById('schedule').style.display = "block";

    }



}
