"use strict";

const startTimer = function(){
    let number = 1
    let interval = setInterval(function(){
        if(number < 25){
            
            if(number < 10){
                //console.log("0" + number);
                document.querySelector(".js-firstnumber").innerHTML = "0";
                document.querySelector(".js-secondnumber").innerHTML = number;
            }
            else{
                //console.log(number);
                //document.querySelector(".klok").innerHTML(number);
                let numeralString = number.toString();
                document.querySelector(".js-firstnumber").innerHTML = numeralString.slice(0,1);
                document.querySelector(".js-secondnumber").innerHTML = numeralString.slice(1,2);
                //console.log(numeralString);
            }
            number++;
        }
        else{
            clearInterval(interval)
            //console.log("timer gestopt")
        }}, 150);
}

const updateTimer = function(number){
    console.log(number);
}

const onPageLoad = function () {
    startTimer();
}

document.addEventListener("DOMContentLoaded", onPageLoad);
