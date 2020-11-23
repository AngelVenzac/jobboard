<?php
    header("Content-type: text/css; charset: UTF-8");
?>

/* ---------- HTML ----------*/

html{
    background-color: lightgrey;
    margin: 0;
    padding: 0;
}

p{
    margin: 0;
}

a#admin{
    color: black;
    margin-bottom: 1vw;
}

/* ---------- BODY ----------*/

body{
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}

header > h1, p{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-bottom: 1vw;
}

h1:hover{
    cursor: pointer;
}

header{
    margin: 2vw;
    margin-top: 0;
    width: 100%;
    border-bottom: solid 3px black;
}

article{
    display: flex;
    flex-direction: column;
    align-items: center;
    border: solid 2px black;
    background: linear-gradient(to right, grey, lightgrey);
    margin: 1vw;
    padding: 1vw;
    height: 20vw;
    width: 20vw;
}

table{
	width: 90%;
    border-collapse: collapse;
	text-align: center;
    margin-left: auto;
    margin-right: auto;
}

td,th{
	border: 1px solid black;
	padding: 5px;
}

p#affichage{
    width: 100%;
    flex-direction: columns;
}

/* ---------- NAV ----------*/

nav{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    border-top: solid 3px black;
}

nav ul li{
    list-style-type: none; 
    float: left;
    text-align: center;
}

nav > ul{
    display: inline-flex;
    align-items: center;
}

.under{
    display: none;
}

.under li{
    display: inline;
    text-align: center;
}

.under a{
    padding-left: .5vw;
    margin: 0;
    border-bottom: none;
}

.under a:hover{
    color: goldenrod;
}

.unroll > a::after{
    content:" ▼";
    font-size: .5vw;
}

nav > ul li:hover .under{
    display: block;
}

li > a{
    display: block;
    text-decoration: none;
    text-align: center;
    color: black;
    padding-right: .5vw;
    padding-left: .5vw;
}

li > a:hover{
    color: goldenrod;
}

#search{
    height: 2vw;
    margin-left: .5vw;
}

.searchbutton{
    margin: 0;
    padding: .2vw;
    margin-left: .5vw;
    margin-right: 1vw;
}

form.search{
    margin: 0;
}

/* ---------- BUTTON ----------*/

button{
    display: flex;
    justify-content: center;
    align-items: center;
    border: solid 2px black;
    background-color: grey;
    border-radius: 1vw;
    padding: 1vw;
    margin-top: 3vw;
}

button:hover{
    background-color: goldenrod;
    box-shadow: 2px 2px 2px black;
    cursor: pointer;
}

button#add{
    margin-left: auto;
    margin-right: auto;
}

/* ---------- LEARNMORE ----------*/

div#learnmore{
    display: flex;
    flex-direction: column;
    border: solid 2px black;
    background-color: goldenrod;
    box-shadow: 2px 2px 2px black;
    width: 100%;
    margin: 1vw;
    padding: 1vw;
}

/* ---------- FOOTER ----------*/

footer{
    position: -webkit-sticky;
    position: sticky;
    bottom: 1vw;
}

/* ---------- LOG IN ----------*/

article.articletype{
    display: flex;
    flex-direction: column;
    align-items: center;
    border: solid 2px black;
    background: linear-gradient(to right, grey, lightgrey);
    margin: 1vw;
    padding: 1vw;
    height: 25vw;
    width: 40vw;
}

form.formtype{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 1vw;
}

form.formtype > input{
    width: 20vw;
    height: 2vw;
    margin: 1vw;
}

input#submit{
    border: solid 2px black;
    background-color: grey;
    border-radius: 1vw;
    margin: 1vw;
}

input#submit:hover{
    background-color: goldenrod;
    box-shadow: 2px 2px 2px black;
    cursor: pointer;
}

a#register{
    text-decoration: none;
    background-color: goldenrod;
    color: black;
    margin-top: 1vw;
    padding: 1vw;
    border: solid 2px black;
    border-radius: 1vw;
}

/* ---------- COMPANIES ----------*/

article#longarticle{
    display: flex;
    flex-direction: column;
    align-items: center;
    border: solid 2px black;
    background: linear-gradient(to right, grey, lightgrey);
    margin: 1vw;
    padding: 1vw;
    height: 50vw;
    width: 40vw;
}

/* ---------- MEDIA SCREEN ----------*/

@media only screen and (max-width: 800px){
    article{
        display: flex;
        flex-direction: column;
        align-items: center;
        border: solid 2px black;
        background: linear-gradient(to right, grey, lightgrey);
        margin: 1vw;
        padding: 1vw;
        height: 30vw;
        width: 30vw;
    }
    article#longarticle{
        display: flex;
        flex-direction: column;
        align-items: center;
        border: solid 2px black;
        background: linear-gradient(to right, grey, lightgrey);
        margin: 1vw;
        padding: 1vw;
        height: 60vw;
        width: 50vw;
    }
}