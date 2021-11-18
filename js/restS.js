"use strict"

const API_URL = 'api/recurso';

const btn = document.querySelector("#post");
btn.addEventListener("click", insertReview);

async function insertReview(){
    let review = document.querySelector("#review").value;
    console.log(review);
    try {
        let res = await fetch (API_URL, {
            "method": "POST",
            "headers": {"Content-type": "application/json"},
            "body": JSON.stringify(review)
        });
        if(res.status == 201 || res.status == 200){
            console.log("Datos cargados!");
        }
    } catch (e){
        console.error();
    }
}