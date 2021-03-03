"use strict";

let attributesArray = [];

const setPostFieldsHidden = function(){
    document.querySelector(".accessoires-value_field").hidden = true;
    document.querySelector(".accessoires-label_field").hidden = true;
}

const clearInputFields = function(){
    document.querySelector("#accessoires-type").value = "";
    document.querySelector("#accessoires-waarde").value = "";
}

const generateArrayOnLoad = function(){
    let labelString = document.querySelector("#accessoires-label").value;
    let valueString = document.querySelector("#accessoires-value").value;
    let labelArray = labelString.split(";");
    let valueArray = valueString.split(";");
    console.log(labelArray.length);
    for(let i = 0 ; i < labelArray.length-1; i++){
        let tempJsonObject = {"type":"", "waarde":""};
        attributesArray.push(tempJsonObject);
    }
    console.log("voor replace");
    console.log(attributesArray);
    for(let i = 0 ; i < attributesArray.length ; i++){
        attributesArray[i].type = labelArray[i];
        attributesArray[i].waarde = valueArray[i];
    }
    console.log("na replace");
    console.log(attributesArray);
    }
const addAccesoireToPost = function(){
    let labelInput = document.querySelector("#accessoires-label");
    let valueInput = document.querySelector("#accessoires-value");
    let labelString = ""; 
    let valueString = "";
    for(let i = 0; i < attributesArray.length ; i++){
    labelString += `${attributesArray[i].type};`; 
    valueString += `${attributesArray[i].waarde};`; 
    }
    console.log(labelString);
    console.log(valueString);
    labelInput.value = labelString;
    valueInput.value = valueString;
}

const generateList = function(){
    let list = document.querySelector(".accessoires-list");
    list.innerHTML = "";
    for(let i = 0 ; i < attributesArray.length ; i++ ){
        list.innerHTML += `<li>${attributesArray[i].type}: ${attributesArray[i].waarde}<a class="attribute-remove" href="#" data-attribute="${i}">verwijderen</a></li>`;
    }
    attributeRemovalListener();
}

const addAccessoire = function(){
    
    let type = document.querySelector("#accessoires-type");
    let waarde = document.querySelector("#accessoires-waarde");
    console.log(type.value);
    console.log(waarde.value);
    if(type.value != "" && waarde.value != ""){
        let jsonObject = {"type":type.value, "waarde":waarde.value};
        attributesArray.push(jsonObject);
        console.log(attributesArray);
    }else{
        console.log("je hebt niet ieder veld ingevuld");
    }
    clearInputFields(); 
    generateList();
    addAccesoireToPost();
}

const attributeRemovalListener = function(){
    let removalButtons = document.querySelectorAll(".attribute-remove");
    console.log(removalButtons);
    for(let i = 0 ; i < removalButtons.length ; i++){
        removalButtons[i].addEventListener("click", removeAttribute);
    }
}

const removeAttribute = function(e){
    e.preventDefault();
    let attributeToRemove =  e.target.dataset.attribute;
    console.log(attributeToRemove);
    attributesArray.splice(attributeToRemove, 1);
    generateList();
    addAccesoireToPost();
    
}

const onPageLoad = function () {
    setPostFieldsHidden();
    clearInputFields();
    generateArrayOnLoad();
    generateList();
    document.querySelector(".accessoires-toevoegen").addEventListener("click", addAccessoire);
    //document.querySelector(".attribute-remove").addEventListener("click", removeAttribute);
    attributeRemovalListener();
}

document.addEventListener("DOMContentLoaded", onPageLoad);