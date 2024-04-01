function displayDonorForm(){

    //steps of the animation
    //1. -Done- extend the biggest div 100% width and height at t=0
    //2. -Done- extend the 2 inner divs to become 50% width for each quickly
    //3. -Done- make the chosen bigger and the other smaller till reaches 0
    //4. -Done- hide the content of the chosen div

    document.getElementById('worksAfterBox').style = "margin-top: 85%";
    //styling the biggest div
    const bigDiv = document.getElementById('SignBox');
    bigDiv.style =  "dipslay: flex; position:absolute; left:0; width: 100%; height: 100%;";
    bigDiv.style.margin = "20% 0px 0px 0px";
    bigDiv.style.padding = "0px";

    //hiding box1 and box2
    let box1 = document.getElementById('box1');
    let box2 = document.getElementById('box2');


    //-----------------------------------------------------------------------------------
    //removing the non-wanted box
    let outerDiv1 = document.getElementById('outerDiv1');
    let outerDiv2 = document.getElementById('outerDiv2');

    let inter1 = document.getElementById('interD1');
    let inter2 = document.getElementById('interD2');

    let menu = document.getElementById('afterDClick');



    box1.style = "width: 100%;"
    box2.style = "width: 100%;"
    outerDiv1.style = "width: 50%;";
    outerDiv2.style = "width: 50%;";

    for(let i = 11; i <= 100; i++) {
        setTimeout(function (){
            outerDiv1.style.height = i+"%";
            outerDiv2.style.height = i+"%";
            box1.style.height = i+"%";
            box2.style.height = i+"%";

        },50+(i*3) );

    }
    for(let i = 1; i<=50 ; i++) {
        var k = 22;
        setTimeout(function (){

            outerDiv2.style.width = (50-i) + "%";
            if(i<=19)
                outerDiv1.style.width = (50-i) + "%";

            if(i == 21) {
                inter1.style = "height: 100%; width: 22%; display: inline-block; float: left";
                inter2.style = "height: 100%; width: 22%; display: inline-block; position: relative; float: center";

                inter1.style.margin = "0px";
                inter2.style.margin = "0px";
                inter1.style.padding = "0px";
                inter2.style.padding = "0px";
                //--------------------------------
                const keyFrames2 = document.createElement("style");
                const ccv2 = document.querySelector('.ccv2')
                keyFrames2.innerHTML = `
  @keyframes loading2 {
    from {
      transform: rotateY(-20deg);
    }
    to {
      transform: rotateY(0deg);
    }
  }

  .ccv2 {
    animation: loading2 0.25s ease 1;
    animation-direction: reverse ;
  }
`;
                ccv2.appendChild(keyFrames2);
                //--------------------------------
                const keyFrames = document.createElement("style");
                const ccv = document.querySelector('.ccv')
                keyFrames.innerHTML = `
  @keyframes loading {
    from {
      transform: rotateY(0deg);
    }
    to {
      transform: rotateY(30deg);
    }
  }

  .ccv {
    animation: loading 0.25s ease 1;
  }
`;
                ccv.appendChild(keyFrames);

                //-------------------------------------------------------------

            }
            if(i>21 && k < 40 ){

                inter1.style.width = k +"%";
                if(k<31)
                    inter2.style.width = k +"%";
                k++;
            }

            //fade the items out
            if(i == 10) {
                box1.animate([
                        {opacity: "1"},
                        {opacity: "0"}
                    ],
                    {
                        duration: 320
                    }
                );
                box2.animate([
                        {opacity: "1"},
                        {opacity: "0"}
                    ],
                    {
                        duration: 320
                    }
                );

                setTimeout(function (){
                    box1.style.display = "none";
                    box1.style.opacity = "0";

                    box2.style.display = "none";
                    box2.style.opacity = "0";

                    menu.style = "display: inline-block; width: 100%; height: 100%";

                },318);

            }
            if(i == 50) {
                outerDiv2.style.display = "none";
                outerDiv1.style.boxShadow = "1px -1px 20px 1px #000";
                outerDiv1.style.zIndex = "5";
            }

        },450+(i*14) );

    }

    document.getElementById("Personal").style.display="inline-block";
    document.getElementById("MedicalDiv").style.display="none";
    document.getElementById("DivChoose").style.display="none";
    document.getElementById("MButtonDiv1").style.display="none";
    document.getElementById("CButtonDiv").style.display="none";
    document.getElementById("CButtonDiv1").style.display="none";


}


function displayRecipientForm(){
    //steps of the animation
    //1. -Done- extend the biggest div 100% width and height at t=0
    //2. -Done- extend the 2 inner divs to become 50% width for each quickly
    //3. -Done- make the chosen bigger and the other smaller till reaches 0
    //4. -Done- hide the content of the chosen div

    //styling the biggest div
    const bigDiv = document.getElementById('SignBox');
    bigDiv.style =  "dipslay: flex; position:absolute; left:0; width: 100%; height: 100%;";
    bigDiv.style.margin = "20% 0px 0px 0px";
    bigDiv.style.padding = "0px";

    //hiding box1 and box2
    let box1 = document.getElementById('box1');
    let box2 = document.getElementById('box2');


    //-----------------------------------------------------------------------------------
    //removing the non-wanted box
    let outerDiv2 = document.getElementById('outerDiv1');
    let outerDiv1 = document.getElementById('outerDiv2');

    let inter1 = document.getElementById('interR1');
    let inter2 = document.getElementById('interR2');

    let menu = document.getElementById('afterRClick');



    box1.style = "width: 100%;"
    box2.style = "width: 100%;"
    outerDiv1.style = "width: 50%;";
    outerDiv2.style = "width: 50%;";

    for(let i = 11; i <= 100; i++) {
        setTimeout(function (){
            outerDiv1.style.height = i+"%";
            outerDiv2.style.height = i+"%";
            box1.style.height = i+"%";
            box2.style.height = i+"%";

        },50+(i*3) );

    }
    for(let i = 1; i<=50 ; i++) {
        var k = 22;
        setTimeout(function (){

            outerDiv2.style.width = (50-i) + "%";
            if(i<=19)
                outerDiv1.style.width = (50-i) + "%";

            if(i == 25) {
                inter1.style = "height: 100%; width: 22%; display: inline-block;      float: left";
                inter2.style = "height: 100%; width: 22%; display: inline-block;position: relative; float: left";

                inter1.style.margin = "0px";
                inter2.style.margin = "0px";
                inter1.style.padding = "0px";
                inter2.style.padding = "0px";
                //--------------------------------
                const keyFrames2 = document.createElement("style");
                const ccv2 = document.querySelector('.ccv2')
                keyFrames2.innerHTML = `
  @keyframes loading2 {
    from {
      transform: rotateY(-20deg);
    }
    to {
      transform: rotateY(0deg);
    }
  }

  .ccv2 {
    animation: loading2 0.25s ease 1;
    animation-direction: reverse ;
  }
`;
                ccv2.appendChild(keyFrames2);
                //--------------------------------
                const keyFrames = document.createElement("style");
                const ccv = document.querySelector('.ccv')
                keyFrames.innerHTML = `
  @keyframes loading {
    from {
      transform: rotateY(0deg);
    }
    to {
      transform: rotateY(30deg);
    }
  }

  .ccv {
    animation: loading 0.25s ease 1;
  }
`;
                ccv.appendChild(keyFrames);

                //-------------------------------------------------------------

            }
            if(i>21 && k < 40 ){
                inter1.style.width = k +"%";
                if(k < 31)
                    inter2.style.width = k +"%";
                k++;
            }

            //fade the items out
            if(i == 10) {
                box1.animate([
                        {opacity: "1"},
                        {opacity: "0"}
                    ],
                    {
                        duration: 280
                    }
                );
                box2.animate([
                        {opacity: "1"},
                        {opacity: "0"}
                    ],
                    {
                        duration: 280
                    }
                );

                setTimeout(function (){
                    box1.style.display = "none";
                    box1.style.opacity = "0";

                    box2.style.display = "none";
                    box2.style.opacity = "0";

                    menu.style = "display: inline-block; width: 100%; height: 100%";

                },278);

            }
            if(i == 50) {
                outerDiv2.style.display = "none";
                outerDiv1.style.boxShadow = "1px -1px 20px 1px #000";
                outerDiv1.style.zIndex = "5";

            }

        },450+(i*12) );


    }

    document.getElementById("PersonalR").style.display="inline-block";
    document.getElementById("MedicalDiv2").style.display="none";
    document.getElementById("DivChoose2").style.display="none";
    document.getElementById("MButtonDiv2").style.display="none";
    document.getElementById("MButtonDiv3").style.display="none";
    document.getElementById("CButtonDiv2").style.display="none";
    document.getElementById("CButtonDiv3").style.display="none";
    document.getElementById('worksAfterBox').style = "margin-top: 85%";

}



//SignUp Boxes Function
let h=0;
function hoverFunction(){

    document.getElementById("DonateButton").style.color="rgb(72, 149, 223)";
    document.getElementById("DonateButton").style='border-color:rgb(72, 149, 223) ; background:white ;color:black';
    document.getElementById("DonateSignUp").style.color="black";
    document.getElementById("DonateSignUp2").style.color="rgba(0,0,0,0.5)";

    document.getElementById("box1").style='background:linear-gradient(10deg,#4895df 2%,white);';
    if(h == 1){
        donateHoverFunction();
    }
    h=0;
}
function removeHoverFunction(){
    document.getElementById("DonateButton").style.color="white";
    document.getElementById("box1").style='background:white;'
    document.getElementById("DonateSignUp").style.color="black";
    document.getElementById("DonateSignUp2").style.color="rgba(0,0,0,0.5)";
    document.getElementById('DonateButton').style.background="rgb(72, 149, 223)";
}
function donateHoverFunction(){
    document.getElementById("DonateButton").style="border-color:none";
    document.getElementById('DonateButton').style.background='linear-gradient(135deg,#4895df 20%,#59caa8);';

    document.getElementById("DonateButton").style.color="white";


    h=1;
}
let h1=0;
function hoverFunction2(){

    document.getElementById("RecipientButton").style.color="rgb(89, 202, 168)";
    document.getElementById("RecipientButton").style='border-color:rgb(89, 202, 168) ; background:white ;color:black';
    document.getElementById("RecipientSignUp").style.color="black";
    document.getElementById("RecipientSignUp2").style.color="rgba(0,0,0,0.5)";

    if(h1 == 1){
        donateHoverFunction1();
    }
    h1=0;
}
function donateHoverFunction1(){
    document.getElementById("RecipientButton").style="border-color:none";
    document.getElementById('RecipientButton').style.background='rgb(89, 202, 168)';

    document.getElementById("RecipientButton").style.color="white";

    h1=1;
}
function removeHoverFunction1(){
    document.getElementById("RecipientButton").style.color="white";

    document.getElementById("RecipientSignUp").style.color="black";
    document.getElementById("RecipientSignUp2").style.color="rgba(0,0,0,0.5)";
    document.getElementById('RecipientButton').style.background="rgb(89, 202, 168)";
}
// End SignUp Boxes Function
/*
counterCheck=1;
function hideDivPersonal(){

    let size=document.getElementsByClassName("check").length;
for(let i=0;i<size;i=i+1){
    val=document.getElementsByClassName("check").item(i).value;

    if(val!=""){
        counterCheck++;
    }
}

//if(document.getElementsByClassName("check").item(i).value){
   //     counterCheck++;
 //   }

console.log("size:"+size);
console.log(counterCheck);
counterCheck++;
if(counterCheck==size){
    document.getElementById("PersonalDiv").style.display="none";
    document.getElementById("MedicalDiv").style.display="inline-block";
    counterCheck=0;
}
counterCheck=0;
}
*/
function showDivPersonal(){
    document.getElementById("CButtonDiv").style.display="none";
    document.getElementById("CButtonDiv1").style.display="none";
    document.getElementById("CID").style.display="inline-block";
    document.getElementById("MButtonDiv1").style.display="none";
    document.getElementById("MButtonDiv").style.display="none";
    document.getElementById("PersonalDiv").style.display="flex";
    document.getElementById("DivChoose").style.display="none";
    document.getElementById("PIB").style='background: rgba(72, 150, 223,0.4);';
    document.getElementById("PMI").style='background: white;';
    document.getElementById("ATG").style='background: white;';
    document.getElementById("MedicalDiv").style.display="none";
    document.getElementById("ButtonDiv").style.display="flex";
    document.getElementById("CID").style="height:80%;box-sizing: border-box;margin-bottom: 3%;margin-top: 14%;width:76%;";

}
function hideDivPersonal(){
    document.getElementById("CButtonDiv1").style.display="none";
    document.getElementById("CButtonDiv").style.display="none";
    document.getElementById("MButtonDiv").style.display="flex";
    document.getElementById("MButtonDiv1").style.display="flex";
    document.getElementById("PMI").style='background: rgba(72, 150, 223,0.4);';
    document.getElementById("PIB").style='background: white;';
    document.getElementById("ATG").style='background: white;';

    document.getElementById("PersonalDiv").style.display="none";
    document.getElementById("DivChoose").style.display="none";
    document.getElementById("ButtonDiv").style.display="none";

    document.getElementById("MedicalDiv").style.display="inline-block";
    document.getElementById("CID").style="height:60%;box-sizing: border-box;margin-bottom: 3%;width:75%; margin-top:24%";
}
function hideDivMedical(){
    document.getElementById("CButtonDiv").style.display="flex";
    document.getElementById("CButtonDiv1").style.display="flex";
    document.getElementById("MButtonDiv").style.display="none";
    document.getElementById("MButtonDiv1").style.display="none";
    document.getElementById("PersonalDiv").style.display="none";
    document.getElementById("MedicalDiv").style.display="none";
    document.getElementById("DivChoose").style.display="flex";
    document.getElementById("ButtonDiv").style.display="none";
    document.getElementById("PMI").style='background: white;';
    document.getElementById("PIB").style='background: white;';
    document.getElementById("ATG").style='background: rgba(72, 150, 223,0.4);';
    document.getElementById("CID").style="height:64%;box-sizing: border-box;margin-bottom: 3%;width:80%; margin-top:24%;";
    console.log("in function to test");
}

function backToPersonal(){

    document.getElementById("CID").style="height:80%;box-sizing: border-box;margin-bottom: 3%;margin-top: 14%;width:76%;";
    document.getElementById("PIB").style='background: rgba(72, 150, 223,0.4);';
    document.getElementById("PMI").style='background: white;';
    document.getElementById("ATG").style='background: white;';
    document.getElementById("PersonalDiv").style.display="flex";
    document.getElementById("MedicalDiv").style.display="none";
    document.getElementById("ButtonDiv").style.display="flex";
    document.getElementById("MButtonDiv").style.display="none";
    document.getElementById("MButtonDiv1").style.display="none";
    document.getElementById("CButtonDiv").style.display="none";
    document.getElementById("CButtonDiv1").style.display="none";

}
function backToMedical(){
    document.getElementById("CButtonDiv").style.display="none";
    document.getElementById("CButtonDiv1").style.display="none";
    document.getElementById("PMI").style='background: rgba(72, 150, 223,0.4);';
    document.getElementById("PIB").style='background: white;';
    document.getElementById("ATG").style='background: white;';
    document.getElementById("DivChoose").style.display="none";
    document.getElementById("PersonalDiv").style.display="none";
    document.getElementById("MButtonDiv").style.display="flex";
    document.getElementById("MButtonDiv1").style.display="flex";
    document.getElementById("MedicalDiv").style.display="inline-block";
    document.getElementById("MedicalDiv").style.display="inline-block";
    document.getElementById("CID").style="height:60%;box-sizing: border-box;margin-bottom: 3%;width:75%; margin-top:24%";

}


function showDivPersonal2(){
    document.getElementById("CButtonDiv2").style.display="none";
    document.getElementById("CButtonDiv3").style.display="none";
    document.getElementById("CID1").style="height: 90vh; position:static ;box-sizing: border-box;width:76%;background: #fff; margin-top: 7%";
    document.getElementById("MButtonDiv2").style.display="none";
    document.getElementById("MButtonDiv3").style.display="none";
    document.getElementById("PersonalDiv2").style.display="flex";
    document.getElementById("DivChoose2").style.display="none";
    document.getElementById("PIB2").style='background: rgba(72, 150, 223,0.4);';
    document.getElementById("PMI2").style='background: white;';
    document.getElementById("ATG2").style='background: white;';
    document.getElementById("MedicalDiv2").style.display="none";
    document.getElementById("ButtonDiv1").style.display="flex";

}
function hideDivPersonal2(){
    document.getElementById("CButtonDiv2").style.display="none";
    document.getElementById("CButtonDiv3").style.display="none";
    document.getElementById("CID1").style="height: 50vh; position:static ;box-sizing: border-box;width:76%;background: #fff; margin-top: 27%";
    document.getElementById("MButtonDiv2").style.display="flex";
    document.getElementById("MButtonDiv3").style.display="flex";
    document.getElementById("PMI2").style='background: rgba(72, 150, 223,0.4);';
    document.getElementById("PIB2").style='background: white;';
    document.getElementById("ATG2").style='background: white;';

    document.getElementById("PersonalDiv2").style.display="none";
    document.getElementById("DivChoose2").style.display="none";
    document.getElementById("ButtonDiv1").style.display="none";
    document.getElementById("MedicalDiv2").style.display="inline-block";
}
function hideDivMedical2(){
    document.getElementById("CButtonDiv2").style.display="flex";
    document.getElementById("CButtonDiv3").style.display="flex";
    document.getElementById("MButtonDiv2").style.display="none";
    document.getElementById("MButtonDiv3").style.display="none";
    document.getElementById("ButtonDiv1").style.display="none";
    document.getElementById("PersonalDiv2").style.display="none";
    document.getElementById("MedicalDiv2").style.display="none";
    document.getElementById("DivChoose2").style.display="inline-block";
    document.getElementById("PMI2").style='background: white;';
    document.getElementById("PIB2").style='background: white;';
    document.getElementById("ATG2").style='background: rgba(72, 150, 223,0.4);';
    document.getElementById("CID1").style="height: 56vh; position:static ;box-sizing: border-box;width:63%;background: #fff; margin-top: 27%;padding:2%";

}

function backToPersonal2(){
    document.getElementById("CButtonDiv2").style.display="none";
    document.getElementById("CButtonDiv3").style.display="none";
    document.getElementById("CID1").style="height: 90vh; position:static ;box-sizing: border-box;width:76%;background: #fff; margin-top: 7%";
    document.getElementById("MButtonDiv2").style.display="none";
    document.getElementById("MButtonDiv3").style.display="none";
    document.getElementById("ButtonDiv1").style.display="flex";

    document.getElementById("PIB2").style='background: rgba(72, 150, 223,0.4);';
    document.getElementById("PMI2").style='background: white;';
    document.getElementById("ATG2").style='background: white;';
    document.getElementById("PersonalDiv2").style.display="flex";
    document.getElementById("MedicalDiv2").style.display="none";
}
function backToMedical2(){
    document.getElementById("CButtonDiv2").style.display="none";
    document.getElementById("CButtonDiv3").style.display="none";
    document.getElementById("CID1").style="height: 50vh; position:static ;box-sizing: border-box;width:76%;background: #fff; margin-top: 27%";
    document.getElementById("MButtonDiv2").style.display="flex";
    document.getElementById("MButtonDiv3").style.display="flex";
    document.getElementById("PMI2").style='background: rgba(72, 150, 223,0.4);';
    document.getElementById("PIB2").style='background: white;';
    document.getElementById("ATG2").style='background: white;';
    document.getElementById("DivChoose2").style.display="none";
    document.getElementById("PersonalDiv2").style.display="none";
    document.getElementById("ButtonDiv1").style.display="none";
    document.getElementById("MedicalDiv2").style.display="inline-block";
}

//-------------------------------------
let t = 0;
function showNav(){

    if(t == 0) {
        document.getElementById('navList1').style = "display: block;";
        t = 1;
    }
    else{
        document.getElementById('navList1').style = "display: none;";
        t = 0;
    }

}


function doEffect(t){
    if(t == 1){
        document.getElementById('blackEffect').style = "z-index: -1; background: rgba(0,0,0,0.6)";

    }
    else{
        document.getElementById('blackEffect').style = "z-index: 1; background: rgba(0,0,0,0.4)";

    }
}
function doEffect2(t){
    if(t == 1){
        document.getElementById('blackEffect2').style = "z-index: -1; background: rgba(0,0,0,0.6)";

    }
    else{
        document.getElementById('blackEffect2').style = "z-index: 1; background: rgba(0,0,0,0.4)";

    }
}

