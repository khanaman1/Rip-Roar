// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
//var navbar = document.getElementById("navbar");
var navbar = document.querySelector(".nav");
//Back To Top Button
//Get the button:
var btnBackToTop = document.getElementById("btnBackToTop");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() { console.log("scrolled!");
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    btnBackToTop.style.display = "block";
  } else {
    navbar.classList.remove("sticky");
    btnBackToTop.style.display = "none";
  }

}

//var mybutton = document.querySelector("#btnBackToTop");

// When the user scrolls down 20px from the top of the document, show the button
/*window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    btnBackToTop.style.display = "block";
  } else {
    btnBackToTop.style.display = "none";
  }
} */

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

/**
 * function for openning the modal. 
 * @param {*} p_name 
 * @param {*} p_price 
 * @param {*} p_description 
 * @param {*} p_opening_season 
 * @param {*} p_duration 
 * @param {*} p_img 
 */
function openModal(p_name, p_price,p_description, p_opening_season, p_duration, p_id, p_img) {

    var modal = document.getElementById('pop-up');
    modal.classList.add("active");
    var title = document.getElementById('p-title');
    var img = document.getElementById('p-img');
    var price = document.getElementById('p-price');
    var description= document.getElementById('p-description');
    var duration= document.getElementById('p-duration');
    var opening_season= document.getElementById('p-opening-season');
    var aLink= document.getElementById('aLink');

   // console.log(img);
    if(screen.width < 980)
    window.scrollTo(0, 0);

    console.log(p_name + " " + p_price + " " + p_img);
    title.innerHTML = p_name.toUpperCase();
    price.innerHTML = "NPR. " + p_price;
    description.innerHTML = p_description.split(" ").splice(0,50).join(" ") + "...";
    duration.innerHTML = "Duration: " + p_duration + " minutes.";
    opening_season.innerHTML = capitalizeFirstLetter(p_opening_season) ;
    img.src = "dbImages/sports/" + p_img;

  //  var scrt_var = 10;
    var strLink = "sport.php?sportId=" + p_id;
    document.getElementById("aLink").setAttribute("href",strLink);
}

/**
 * Function for closing the modal.
 */
function closeModal() {
    var modal = document.getElementById('pop-up');
    modal.classList.remove("active");
}