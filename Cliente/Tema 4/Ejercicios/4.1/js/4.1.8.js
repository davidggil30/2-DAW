function calculatorDC(){
    var entity = document.getElementById("entity");
    var office = document.getElementById("office");
    var controlDigit = document.getElementById("controlDigit");
    var accNum = document.getElementById("accNum");

    entity.value = completeZeros(entity.value, 4); 
    office.value = completeZeros(office.value, 4);
    accNum.value = completeZeros(accNum.value, 10);

    var opEntity = entity.value[0]*4 + entity.value[1]*8 + entity.value[2]*5 + entity.value[3]*10;
    var opOffice = office.value[0]*9 + office.value[1]*7 + office.value[2]*3 + office.value[3]*6;
    var firstDigit = 11 - ((opEntity + opOffice) % 11);
    if(firstDigit == 10){
        firstDigit = 1;
    }
    firstDigit = firstDigit.toString();

    var opAccNum = accNum.value[0]*1 + accNum.value[1]*2 + accNum.value[2]*4 + accNum.value[3]*8 +
            accNum.value[4]*5 + accNum.value[5]*10 + accNum.value[6]*9 + accNum.value[7]*7 + accNum.value[8]*3 + accNum.value[9]*6;
    var secondDigit = 11 - (opAccNum % 11);
    if(secondDigit == 10){
        secondDigit = 1;
    }
    secondDigit = secondDigit.toString();
    controlDigit.value = parseInt(firstDigit+secondDigit); 
}


function completeZeros(value, length) {
    var num = value.toString();
    
    while (num.length < length) {
        num = "0" + num;
    }
    return num;
}





