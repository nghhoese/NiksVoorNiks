document.querySelector('#manualInputContainer').hidden = true;
document.querySelector('#manualInput').addEventListener('click', function (event) {
    let minPrice = document.querySelector('#minPrice');
    let maxPrice = document.querySelector('#maxPrice');
    if (document.querySelector('#manualInput').innerHTML == 'Handmatig invoeren') {
        let minPrice = document.querySelector('#minPrice');
        let maxPrice = document.querySelector('#maxPrice');
        document.querySelectorAll('.slidecontainer').forEach(function (item, index) {

            minPrice.id = 'minPriceOld';
            minPrice.name = 'minPriceOld';
            maxPrice.id = 'maxPriceOld';
            maxPrice.name = 'maxPriceOld';
            item.hidden = true;
        })
        let minPriceHand = document.querySelector('.minPriceHand');
        let maxPriceHand = document.querySelector('.maxPriceHand');
        minPriceHand.id = 'minPrice';
        minPriceHand.name = 'minPrice';
        maxPriceHand.id = 'maxPrice';
        maxPriceHand.name = 'maxPrice';
        document.querySelector('#manualInputContainer').hidden = false;

        document.querySelector('#manualInput').innerHTML = 'Instellen met slider';


    } else {
        let minPriceHand = document.querySelector('.minPriceHand');
        let maxPriceHand = document.querySelector('.maxPriceHand');
        minPriceHand.id = 'minPriceOld';
        minPriceHand.name = 'minPriceOld';
        maxPriceHand.id = 'maxPriceOld';
        maxPriceHand.name = 'maxPriceOld';
        document.querySelector('#manualInputContainer').hidden = true;
        let minPrice = document.querySelector('#minPriceOld');
        let maxPrice = document.querySelector('#maxPriceOld');
        document.querySelectorAll('.slidecontainer').forEach(function (item, index) {

            minPrice.id = 'minPrice';
            minPrice.name = 'minPrice';
            maxPrice.id = 'maxPrice';
            maxPrice.name = 'maxPrice';
            item.hidden = false;
        })

        document.querySelector('#manualInput').innerHTML = 'Handmatig invoeren';
    }

});
document.querySelector('#gevraagd').addEventListener('click', function (event) {

    document.querySelector('.btn').click();
});
document.querySelector('#aangeboden').addEventListener('click', function (event) {

    document.querySelector('.btn').click();
});


document.querySelector('#selectCategory').addEventListener('click', function (event) {
    if (document.querySelector('#selectCategory').selectedIndex != 0) {
        document.querySelector('.btn').click();
    }
});

document.querySelector('#selectPlace').addEventListener('click', function (event) {
    if (document.querySelector('#selectPlace').selectedIndex != 0) {
        document.querySelector('.btn').click();
    }
});
var slider = document.querySelector("#minPrice");
var output = document.querySelector("#valueMin");
output.innerHTML = slider.value;
slider.addEventListener('mouseup', function (event) {
    document.querySelector('.btn').click();
});
slider.oninput = function () {
    output.innerHTML = this.value;

}
var slider1 = document.querySelector("#maxPrice");
var output1 = document.querySelector("#valueMax");
output1.innerHTML = slider1.value;
slider1.addEventListener('mouseup', function (event) {
    document.querySelector('.btn').click();
});
slider1.oninput = function () {
    output1.innerHTML = this.value;

}