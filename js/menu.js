// getting menu element
const  menu = document.getElementById("menu");

// store menu-items in array for parallax effect
// mouse hover event
Array.from(document.getElementsByClassName("menu-item"))
    .forEach((item, index) => {
        item.onmouseover = () => {
            console.log(index);
            menu.dataset.activeIndex = index;
        }
    });