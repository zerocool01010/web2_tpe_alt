"use strict"

const API_URL = 'api/recurso';

const btn = document.querySelector("#post");
btn.addEventListener("click", insertReview);

async function insertReview(){
    let review = document.querySelector("#review").value;
    console.log(review);
    try {

    } catch (e){
        console.error();
    }
}