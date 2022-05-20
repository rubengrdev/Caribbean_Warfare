/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/region.js ***!
  \********************************/

/******/ })()
;




const getRegions = async () => {
    const response = await fetch("http://localhost:8000/regions",{
        method: 'GET',
        headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    "X-CSRF-Token": document.querySelector('input[name=_token]').value
}});
    const data = await response.json();
    console.log(data);


}
console.log(getRegions());
