

function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

var totalquestons=30;
var qstart=1,qend=30,index=0;
var qsort=[];
while(qstart<=qend){
    qsort[index++]=qstart++;
}
var qrand=shuffle(qsort);
console.log(qrand);
var i=0; //Current question index
var answered= new Array(totalquestons);


for(j=0;j<totalquestons;j++){
    answered[j]={"question":"Hi there","op1":"","op2":"","op3":"","op4":"","crt":"","checked":0,"res":0};
}

$(function(){
    console.log("qrand["+i+"]"+"is"+qrand[i]);
    getquestion(qrand[i]); //pass qrand[q];
});

function getquestion(qid,callback){
    
    $.ajax({
        url: 'getquestion.php?qid='+qid,
        type:'POST',
        dataType: 'json',
        success: function(data){
            
            $('#question').html(data.question);
            $('#op1').html('<input type="radio" name="ans" value="1" />  '+data.op1);
            $('#op2').html('<input type="radio" name="ans" value="2" />  '+data.op2);
            $('#op3').html('<input type="radio" name="ans" value="3" />  '+data.op3);
            $('#op4').html('<input type="radio" name="ans" value="4" />  '+data.op4);
            
            answered[i]["question"]=data.question;
            answered[i]["op1"]=data.op1;
            answered[i]["op2"]=data.op2;
            answered[i]["op3"]=data.op3;
            answered[i]["op4"]=data.op4;
            answered[i]["crt"]=parseInt(data.crt);
            console.log("Got question number "+i+" from DB");
            document.getElementById('qno').innerHTML=i+1;
            document.getElementById('qno').innerHTML+=" / "+totalquestons;
            if(i+1==totalquestons){
                $("#nxtbtn").attr('onClick','save()');

            }
            if(typeof callback === 'function'){
                callback(i);
            }
        }
    });
}

$(document).on('change','input[name=ans]:checked',function() {
    $radio=$('input[name=ans]:checked');
    answered[i]["checked"]=parseInt($radio.val());
    validate(i);
    console.log("Saved"+answered[i]["checked"]);
});

function save(callback){

    data=JSON.stringify(answered);
    var user=document.getElementById("userid").innerHTML;
    $.ajax({
        url: 'save.php?uid='+user,
        type:'POST',
        contentType: "application/json; charset=utf-8",
        data: data,
        success: function(data){
            
            if(data=="done"){
               
               window.location='thankyou.php';
            }
            else
            {
                alert("Save error !");
            }
            if(callback==='function'){
                callback();
            }
        }
    });
}

$(function() {
    $('#nxtbtn').on('click',function(){
        $radio=$('input[name=ans]:checked');
        
        answered[i]["checked"]=parseInt($radio.val());
        
        validate(i);
        //console.log(answered[q-1]["res"]);
        if(i<totalquestons-1){
            i++;
            getquestion(qrand[i],remember); //pass qrand[q];
        }
    });
});

$(function() {
    $('#backbtn').on('click',function(){
        $radio=$('input[name=ans]:checked');
        //console.log("Inside back fun "+parseInt($radio.val())+" AND "+$radio.val());
        answered[i]["checked"]=parseInt($radio.val());
        validate(i);
        if(i>0 ){
            i--;
            getquestion(qrand[i],remember);
        }
    });
});

function validate(i){
    if(answered[i]["checked"]==answered[i]["crt"]){
        answered[i]["res"]=1;
    } else {
        answered[i]["res"]=0;
    }
}

function remember(i){
    //console.log("Inside Remember");
    switch(answered[i]["checked"]){
        case 1: $('#op1').html('<input type="radio" name="ans" value="1" checked />  '+answered[i]["op1"]);
        break;
        case 2: $('#op2').html('<input type="radio" name="ans" value="2" checked />  '+answered[i]["op2"]);
        break;
        case 3: $('#op3').html('<input type="radio" name="ans" value="3" checked />  '+answered[i]["op3"]);
        break;
        case 4: $('#op3').html('<input type="radio" name="ans" value="4" checked />  '+answered[i]["op4"]);
        break;
    }
}

function end(){
    window.location='thankyou.php';
}

$(document).on("click","#logout",function(){
	window.location="logout.php";
});