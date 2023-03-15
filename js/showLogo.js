function showLogo(){
    // Get a reference to the image element
    var imgElement = document.querySelector(".logo");
    var home = document.getElementById(home);
            
    // Get a reference to the style object of the image element
    var style = window.getComputedStyle(imgElement);
    
    // Get the width and height of the image element as set in the CSS file
    var originalWidth = style.getPropertyValue("width");
    var originalHeight = style.getPropertyValue("height");
    
    if(home.onmouseover){
        // Modify the width and height of the image element
        imgElement.style.width = "200px";
        imgElement.style.height = "200px";
    }
}