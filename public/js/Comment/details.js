var stars = document.querySelectorAll('.fa-star');
var maincontract = document.querySelector('.maincontract');
const removeStars = () => {
    Array.from(stars).forEach((star) => star.classList.remove('active_icon'));

};
stars.forEach((star) => {
    star.addEventListener('click', function () {
        removeStars();
        star.classList.add("active_icon");
        maincontract.classList.add("show_contract");
    });
});


// < ---------------------------- Comment Buttons --------------------------------------- >

let els= document.querySelectorAll("[data-id]");
let cancelButtons= document.querySelectorAll("[data-cancel]");
let cancelReplyButtons= document.querySelectorAll("[data-cancelreply]");
let replyButtons= document.querySelectorAll("[data-reply]");

els.forEach(e => {
    e.addEventListener('click',(a)=>{
        let target = a.target;
        let elId = target.dataset.id;
        let oldComment= document.querySelectorAll(`[data-old-comment-id=${elId}]`)[0];
        let newComment= document.querySelectorAll(`[data-new-comment-id=${elId}]`)[0];
        newComment.style.display = "block";
        oldComment.style.display = "none";
    });
});
cancelButtons.forEach(e => {
    e.addEventListener('click',(a)=>{
        let target = a.target;
        let elId = target.dataset.cancel;
        let oldComment= document.querySelectorAll(`[data-old-comment-id=${elId}]`)[0];
        let newComment= document.querySelectorAll(`[data-new-comment-id=${elId}]`)[0];
        newComment.style.display = "none";
        oldComment.style.display = "block";
    });
});
replyButtons.forEach(e => {
    e.addEventListener('click',(a)=>{
        let target = a.target;
        let elId = target.dataset.reply;
        let replyB= document.querySelectorAll(`div[data-reply=${elId}]`)[0];
        replyB.style.display = "block";
    });
});
cancelReplyButtons.forEach(e => {
    e.addEventListener('click',(a)=>{
        let target = a.target;
        let elId = target.dataset.cancelreply;
        let reply= document.querySelectorAll(`div[data-reply=${elId}]`)[0];
        reply.style.display = "none";
    });
});
// < ---------------------------- Comment Buttons --------------------------------------- >


// < ---------------------------- Reply Buttons --------------------------------------- >

let editReply= document.querySelectorAll("[data-editReply]");
let cancelReply= document.querySelectorAll("[data-cancelreply]");
// let cancelReplyButtons= document.querySelectorAll("[data-cancelreply]");
// let replyButtons= document.querySelectorAll("[data-reply]");

editReply.forEach(e => {
    e.addEventListener('click',(a)=>{
        let target = a.target;
        let elId = target.dataset.editreply;
        let oldreply= document.querySelectorAll(`[data-old-reply-id=${elId}]`)[0];
        let newReply= document.querySelectorAll(`[data-new-reply-id=${elId}]`)[0];
        newReply.style.display = "block";
        oldreply.style.display = "none";
    });
});
cancelReply.forEach(e => {
    e.addEventListener('click',(a)=>{
        let target = a.target;
        let elId = target.dataset.cancelreply;
        let oldComment= document.querySelectorAll(`[data-old-reply-id=${elId}]`)[0];
        let newComment= document.querySelectorAll(`[data-new-reply-id=${elId}]`)[0];
        newComment.style.display = "none";
        oldComment.style.display = "block";
    });
});

// < ---------------------------- Reply Buttons --------------------------------------- >

// < ---------------------------- ScrollTop Button --------------------------------------- >

let btn1 = document.getElementById("btn1");
window.onscroll = function () {
    if (scrollY >= 200) {
        btn1.style.display = "flex";
    } else {
        btn1.style.display = "none";

    }
}
btn1.addEventListener("click", function () {
    scroll({
        top: 0,
        left: 0,
        behavior: "smooth"
    })
});
// ---------------------------------------------------------------
AOS.init({
    duration: 550,
    });
