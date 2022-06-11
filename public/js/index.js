/*jshint esversion: 6 */

document.addEventListener("DOMContentLoaded", function() {
 var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

 if ("IntersectionObserver" in window) {
    let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
     entries.forEach(function(entry) {

         if (entry.isIntersecting) {
           let lazyImage = entry.target;
           lazyImage.src = lazyImage.dataset.src;
           lazyImage.srcset = lazyImage.dataset.srcset;
           lazyImage.classList.remove("lazy");
           lazyImageObserver.unobserve(lazyImage);
           }
     });
   });

   lazyImages.forEach(function(lazyImage) {
      lazyImageObserver.observe(lazyImage);
    });
   } else {
        // Possibly fall back to a more compatible method here
     }
});



function show(path){
  let image = document.getElementById("myImage");
   image.src = path;
   
  }

  function showPost(path) {
    let xhttp;  
    if (path == "") {
      document.getElementById("rawResponse").innerHTML ="";
      return alert("there is no path!");
    }
    xhttp = new XMLHttpRequest();
    xhttp.responseType = 'document';
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        myFunction(this);
      }
    };
    xhttp.open("GET", "/post/"+path, true);
    xhttp.send();
  }

  function myFunction(xml){
  
 let xmlDoc = xml.responseXML;
document.getElementById('modal-content').innerHTML = xmlDoc.getElementById('thisPostContainer').innerHTML;
 //document.getElementById('modal-content').innerHTML = xml.responseText;
 
}
  

