/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/rank.js ***!
  \******************************/
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var Rank = /*#__PURE__*/function () {
  function Rank(button) {
    _classCallCheck(this, Rank);

    this.button = button;
    this.text = document.querySelector(".rank p");
  }

  _createClass(Rank, [{
    key: "ranks",
    get: function get() {
      this.fetchData();
    }
  }, {
    key: "fetchData",
    value: function fetchData() {
      this.button.addEventListener("click", function () {
        console.log("ok");
        fetch(window.location + "/rank").then(function (response) {
          return response.text();
        }).then(function (data) {
          return putData(data);
        });
      });
    }
  }, {
    key: "putData",
    value: function putData(data) {
      if (data != null) {
        this.text.textContent = data;
      }
    }
  }]);

  return Rank;
}();

var button = document.querySelector(".rank");
var ranks = new Rank(button);
ranks.fetchData();
console.log("ok");
/******/ })()
;
