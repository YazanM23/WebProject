function fillData(size,index){


    for(let i = 0; i < size; i++){

        let strID = 'id' + i;
        let strName = 'name' + i;
        let strBlood = 'blood' + i;
        let strAddress = 'address' + i;
        let strPhone = 'phone' + i;
        let strEmail = 'email' + i;


        strTest  = 'test' + i;

        if(index == i) {
            let id = document.getElementById(strID).innerText;
            let name = document.getElementById(strName).innerText;
            let blood = document.getElementById(strBlood).innerText;
            let address = document.getElementById(strAddress).innerText;
            let phone = document.getElementById(strPhone).innerText;
            let email = document.getElementById(strEmail).innerText;

            document.getElementById(strTest).value = id + '*' + name + '*' + blood + '*' + address + '*' + phone + '*' + email;
        }



    }


}


function fillDataRec(size,index){


    for(let i = 0; i < size; i++){

        let strID = 'idRec' + i;
        let strName = 'nameRec' + i;
        let strBlood = 'bloodRec' + i;
        let strAddress = 'addressRec' + i;
        let strPhone = 'phoneRec' + i;
        let strEmail = 'emailRec' + i;

        strTest  = 'testRec' + i;

        if(index == i) {
            let id = document.getElementById(strID).innerText;
            let name = document.getElementById(strName).innerText;
            let blood = document.getElementById(strBlood).innerText;
            let address = document.getElementById(strAddress).innerText;
            let phone = document.getElementById(strPhone).innerText;
            let email = document.getElementById(strEmail).innerText;

            document.getElementById(strTest).value = id + '*' + name + '*' + blood + '*' + address + '*' + phone + '*' + email;
        }



    }


}

function fillDataSur(size,index){


    for(let i = 0; i < size; i++){

        let strID = 'idSur' + i;
        let strName = 'nameSur' + i;
        let strHospital = 'hospitalSur' + i;


        strTest  = 'testSur' + i;

        if(index == i) {
            let id = document.getElementById(strID).innerText;
            let name = document.getElementById(strName).innerText;
            let hospital = document.getElementById(strHospital).innerText;
            document.getElementById(strTest).value = id + '*' + name + '*' + hospital;
        }



    }

}


function fillDataHos(size,index){


    for(let i = 0; i < size; i++){

        let strName = 'nameHos' + i;
        let strAddress = 'addressHos' + i;
        let strPhone = 'phoneHos' + i;


        strTest  = 'testHos' + i;

        if(index == i) {
            let name = document.getElementById(strName).innerText;
            let address = document.getElementById(strAddress).innerText;
            let phone = document.getElementById(strPhone).innerText;
            document.getElementById(strTest).value = name + '*' + address + '*' + phone;
        }



    }

}


function fillDataDoc(size,index){


    for(let i = 0; i < size; i++){

        let strId = 'idDoc' + i;
        let strName = 'nameDoc' + i;
        let strPhone = 'phoneDoc' + i;
        let strEmail = 'emailDoc' + i;
        let strAddress = 'addressDoc' + i;



        strTest  = 'testDoc' + i;

        if(index == i) {
            let id = document.getElementById(strId).innerText;
            let name = document.getElementById(strName).innerText;
            let phone = document.getElementById(strPhone).innerText;
            let email = document.getElementById(strEmail).innerText;
            let address = document.getElementById(strAddress).innerText;

            document.getElementById(strTest).value = id + '*' + name + '*' + phone + '*' + email + '*' + address;
        }



    }

}

function fillDataSurgery(size,index){


    for(let i = 0; i < size; i++){

        let strSurgery = 'numSurgery' + i;
        let strDonor = 'donorSurgery' + i;
        let strRecipient = 'recipientSurgery' + i;
        let strDate = 'dateSurgery' + i;
        let strResult = 'resultSurgery' + i;



        strTest  = 'testSurgery' + i;

        if(index == i) {
            let surgery = document.getElementById(strSurgery).innerText;
            let donor = document.getElementById(strDonor).innerText;
            let recipient = document.getElementById(strRecipient).innerText;
            let date = document.getElementById(strDate).innerText;
            let result = document.getElementById(strResult).innerText;

            document.getElementById(strTest).value = surgery + '*' + donor + '*' + recipient + '*' + date + '*' + result;
        }



    }

}