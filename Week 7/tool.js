function calculatePrice() {
    alert("Calculate Price");
}

function calculatePrice2() {
    alert("Calculate Price 2");
}

function clickP3() {
    alert("p3 clicked");
    event.stopImmediatePropagation();
}

var myButton = document.getElementById("price2");
myButton.onclick = calculatePrice2;

var myButton = document.getElementById("price3");
myButton.addEventListener("click", calculatePrice);
myButton.addEventListener("click", calculatePrice2);

var myP3 = document.getElementById("p3");
myP3.addEventListener("click", clickP3, true);