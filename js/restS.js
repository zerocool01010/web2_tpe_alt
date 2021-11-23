"use strict";

const API_URL = 'api/recurso';

const btnGet = document.querySelector("#getAll");
btnGet.addEventListener("click", getReviews);
const btnPost = document.querySelector("#post");
btnPost.addEventListener("click", insertReview);


async function getReviews(e) {
    e.preventDefault();
    let list = document.querySelector("#list");
    try {
        let response = await fetch(API_URL);
                                            
        let reviews = await response.json();
        console.log(reviews);
        list.innerHTML = null;
        for (const review of reviews) {
            list.innerHTML += `
            <li>
            ${review.reseña}
            </li>
            `;
        }
    } catch (e) {
        console.log(e);
    }
}

async function insertReview(e){
    e.preventDefault();
    let form = document.querySelector("#form");
    let formData = new FormData(form);
    let reviewObj = {
        "reseña": formData.get('review'),
		"valoracion": parseInt(formData.get('value'))
    }
    console.log(reviewObj);

    try {
        let res = await fetch (API_URL, {
            "method": "POST",
            "headers": {"Content-type": "application/json"},
            "body": JSON.stringify(reviewObj)
        });
        if(res.status == 200){
            console.log("Datos cargados!");
        }
    } catch (error){
        console.error();
    }
}