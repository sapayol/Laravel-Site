var controllers=angular.module("controllers",["sapayolControllers"]),sapayolControllers=angular.module("sapayolControllers",[]);sapayolControllers.controller("lookAndFitCtrl",["$scope","$http","$q",function(o,n,r){o.selectedColumn=0,o.jacket={leather_type:"lamb heavy",leather_color:"black",lining_color:"black",hardware_color:"silver",size:44}}]),sapayolControllers.controller("checkoutCtrl",["$scope","$http","$q",function(o,n,r){o.submitUserInfo=function(){o.userInfoForm.$valid?(addUserInfoToOrder(o.user),o.userInfoSubmitted=!0):o.showShippingErorrs=!0},o.submitShippingInfo=function(){o.shippingInfoForm.$valid?(addShippingInfoToOrder(o.shippingInfo),o.shippingInfoSubmitted=!0):o.showShippingErorrs=!0},o.submitPaymentInfo=function(){o.checkoutStep=4},addUserInfoToOrder=function(){},addShippingInfoToOrder=function(){}}]),function(){"use strict";angular.module("sapayolApp",["controllers","duScroll","angularPayments","angular-loading-bar"]).run(["$timeout",function(o){o(function(){$(document).ready(function(){$(".home-carousel").slick({dots:!0,mobileFirst:!0})})},500)}]).directive("scrollToTop",function(){return{restrict:"A",link:function(o,n){n.on("click",function(){$("body").animate({scrollTop:0},"slow")})}}})}();
//# sourceMappingURL=../maps/main.js.map