/*! banking-2.js | Huro | Css ninja 2020-2021 */
"use strict";function _typeof(e){return _typeof="function"==typeof Symbol&&"symbol"==_typeof(Symbol.iterator)?function(e){return void 0===e?"undefined":_typeof(e)}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":void 0===e?"undefined":_typeof(e)},_typeof(e)}function _defineProperty(e,t,o){return(t=_toPropertyKey(t))in e?Object.defineProperty(e,t,{value:o,enumerable:!0,configurable:!0,writable:!0}):e[t]=o,e}function _toPropertyKey(e){var t=_toPrimitive(e,"string");return"symbol"===(void 0===t?"undefined":_typeof(t))?t:String(t)}function _toPrimitive(e,t){if("object"!==(void 0===e?"undefined":_typeof(e))||null===e)return e;var o=e[Symbol.toPrimitive];if(void 0!==o){var r=o.call(e,t||"default");if("object"!==(void 0===r?"undefined":_typeof(r)))return r;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}$(document).ready((function(){var e;$(".cards-carousel-inner").slick({dots:!0,arrows:!1,infinite:!0,variableWidth:!0,prevArrow:"<div class='slick-custom is-prev'><i class='fas fa-angle-left'></i></div>",nextArrow:"<div class='slick-custom is-next'><i class='fas fa-angle-right'></i></div>",slidesToShow:2});var t=(_defineProperty(e={chart:{type:"area",height:220,foreColor:"#999",stacked:!0,toolbar:{show:!1},dropShadow:{enabled:!0,enabledSeries:[0],top:-2,left:2,blur:5,opacity:.06}},colors:[themeColors.accent,themeColors.orange,themeColors.orange],stroke:{curve:"smooth",width:3},title:{text:"",align:"left"},legend:{position:"top"},dataLabels:{enabled:!1},series:[{name:"Cash Expenses",data:o(0,18)},{name:"Card Expenses",data:o(1,18)}],markers:{size:0,strokeColor:"#fff",strokeWidth:3,strokeOpacity:1,fillOpacity:1,hover:{size:6}},xaxis:{type:"datetime",axisBorder:{show:!1},axisTicks:{show:!1}},yaxis:{labels:{offsetX:0,offsetY:-5},tooltip:{enabled:!0}},grid:{show:!1,padding:{left:-5,right:5}},tooltip:{x:{format:"dd MMM yyyy"}}},"legend",{position:"top",horizontalAlign:"left"}),_defineProperty(e,"fill",{type:"solid",fillOpacity:.7}),e);function o(e,t){for(var o=[[4,3,10,9,29,19,25,9,12,7,19,5,13,9,17,2,7,5],[2,3,8,7,22,16,23,7,11,5,12,5,10,4,15,2,6,2]],r=0,i=[],n=new Date("11 Nov 2020").getTime();r<t;)i.push([n,o[e][r]]),n+=864e5,r++;return i}new ApexCharts(document.querySelector("#timeline-chart"),t).render()}));