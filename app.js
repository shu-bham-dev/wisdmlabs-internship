const searchBar = document.getElementById("search-bar");
let articles = document.getElementById("article-section");
let slideImage = document.getElementById("slides-Mid");
//WHY slidesMid not working instead of slides-Mid is working????
let slideLeft = document.getElementById("slide-left");
let slideRight = document.getElementById("slide-right");

var datajson = [];
var slidejson = [];
var filterPost = [];
let searchKey = '';
let it = 1;
let slideln;

//Page-Startup -- 1. Setting up the first banner image. 2. Fetching the initial post data
window.onload = function() {
    $(document).ready(function() {
        $.ajax({
            url: "slides.json",
            type: "GET",
            success: function(data) {
                slidejson = data;
                slideImage.style.backgroundImage = "url(" + slidejson[it++].img + ")";
                slideshow();
            }
        });
    });
    fetchdata(0);
}

// 5-second Banner Slideshow
function slideshow() {
    setInterval(startup, 5000);
}

// Slideshow-Function
function startup() {
    slideln = slidejson.length;
    slideImage.style.backgroundImage = "url(" + slidejson[it++ % slideln].img + ")";

}

//Left and Right Banner Buttons
slideLeft.onclick = function left() {
    if (it > 0) {
        slideImage.style.backgroundImage = "url(" + slidejson[it++ % slideln].img + ")";
    }
}
slideRight.onclick = function right() {
    if (it > 0) {
        slideImage.style.backgroundImage = "url(" + slidejson[it-- % slideln].img + ")";
    }


}

//Search-Bar-Event--Listener
searchBar.addEventListener('keyup', (e) => {
    search();
});

//Populating the Search Results
function search() {
    searchKey = searchBar.value;
    filterPost = [];
    datajson.forEach(item => {
        if (item.title.toLowerCase().search(searchKey.toLowerCase()) != -1 || item.desc.toLowerCase().search(searchKey.toLowerCase()) != -1) {
            filterPost.push(item);
        }
    })
    populateSearch(filterPost, 0);
}
//population the search results
function populateSearch(filterPost, str) {
    let postArray = '';
    let lengthofPost = filterPost.length;
    PageNumbers(filterPost);
    if (lengthofPost == 0) {
        articles.innerHTML = `<h1> Sorry, No Post Available.</h1>`
    } else {
        for (let i = (4 * str); i < ((4 * str) + 4) && i < lengthofPost; i++) {
            time = 1;
            postArray += `<div class='article-row'>
                        <div class='article-col'>
                        <div class='article-img img-a' style= "background-image: url(${filterPost[i].img});">
                        <div class='article-cat'> ${filterPost[i].category} </div>
                        </div>
                        <p class='article-heading'>${filterPost[i].title} </p>
                        <div class='aricle-dateandtime'> <div class'combine'> ${time} <strong class='author'> &nbsp&nbsp/ By: ${filterPost[i].author}</strong></div>
                        <p class='comment-number'> ${filterPost[i].comment_count} comments </p>
                        </div>
                        <p class='article-desc'> ${filterPost[i].desc}</p>
                        </div>
                        </div>
                        </div>`;
        }

        pagination_active_color(str);
        articles.innerHTML = postArray;
    }
}

//Inserting the pagination-buttons according to content
function PageNumbers(datajson) {
    let Number_page = Math.round(datajson.length / 4);
    if (Number_page === 0 && datajson.length != 0)
        Number_page = 1;
    let pages = ``;
    for (let i = 0; i < Number_page; i++) {
        pages += `<div class="page" id="page${i}" onclick="pagination(${i})">${i+1}</div>`
    }

    document.getElementById("pagination-part").innerHTML = pages;
}

//Onclick-buttons
function pagination(pagenum) {
    articles.innerHTML = "";
    if (searchKey == '') {
        fetchdata(pagenum);
    } else {
        populateSearch(filterPost, pagenum);
    }
}
//page number active colors
function pagination_active_color(start) {
    let actv_btn = document.getElementById(`page${start}`);
    actv_btn.classList.add("active");
}
//Fetching Json data and appending the html.
function fetchdata(start) {
    $(document).ready(function() {
        $.ajax({
            url: "posts.json",
            type: "GET",
            success: function(data) {
                datajson = data.posts;
                for (let i = 4 * start; i < (4 * start) + 4 && i < datajson.length; i++) {
                    time = timeCalc(datajson[i].datetime);
                    $(".art-sections").append(
                        `<div class='article-row'>
                        <div class='article-col'>
                        <div class='article-img img-a' style= "background-image: url(${datajson[i].img});">
                        <div class='article-cat'> ${datajson[i].category} </div>
                        </div>
                        <p class='article-heading'>${datajson[i].title} </p>
                        <div class='aricle-dateandtime'> <div class'combine'> ${time} <strong class='author'> &nbsp&nbsp/ By: ${datajson[i].author}</strong></div>
                        <p class='comment-number'> ${datajson[i].comment_count} comments </p>
                        </div>
                        <p class='article-desc'> ${datajson[i].desc}</p>
                        </div>
                        </div>
                        </div>`
                    )
                }
                PageNumbers(datajson);
                pagination_active_color(start);
            }
        });
    });
}

function timeCalc(unixTime) {
    //FORMAT- 28 MAR, 2014 1:13 a.m.
    var date = new Date(unixTime * 1000);
    var year = date.getFullYear();
    var month = date.toLocaleString('default', { month: 'short' });
    var dates = date.getDate();

    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'P.M' : 'A.M';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0' + minutes : minutes;
    return `${dates} ${month}, ${year} ${hours}:${minutes} ${ampm}`;
}