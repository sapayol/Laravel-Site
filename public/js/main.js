!function(){"use strict";function e(){var e=$(window).height(),r=parseInt(e)+"px";$(".homepage-hero-module").css("height",r)}function r(e){$(e).each(function(){$(this).data("height",$(this).height()),$(this).data("width",$(this).width())}),o(e)}function o(e){var r,o,t=$(window).width(),n=$(window).height();$(e).each(function(){var e=$(this).data("height")/$(this).data("width"),s=n/t;e>s?(r=t,o=r*e,$(this).css({top:-(o-n)/2+"px","margin-left":0})):(o=n,r=o/e,$(this).css({"margin-top":0,"margin-left":-(r-t)/2+"px"})),$(this).width(r).height(o),$(".homepage-hero-module .video-container video").addClass("fadeIn animated")})}angular.module("sapayolApp",["controllers","services","factories","duScroll","cgNotify","angularPayments","angular-loading-bar","ngMask"]).run(["$timeout",function(e){e(function(){$(document).ready(function(){$(".home-carousel").slick({dots:!0,arrows:!1,mobileFirst:!0})}),$(document).foundation()},500)}]).directive("scrollToTop",function(){return{restrict:"A",link:function(e,r){r.on("click",function(){$("body").animate({scrollTop:0},"slow")})}}});$(function(){$("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);if(e=e.length?e:$("[name="+this.hash.slice(1)+"]"),e.length)return $("html,body").animate({scrollTop:e.offset().top},1e3),!1}})}),plyr.setup({controls:["play","fullscreen"]}),$(document).ready(function(){e(),r(".video-container .poster img"),r(".video-container .filter"),r(".video-container video"),$(window).on("resize",function(){e(),o(".video-container .poster img"),o(".video-container .filter"),o(".video-container video")})})}();var controllers=angular.module("controllers",["checkoutController","globalController","lookController","measurementController"]),checkoutController=angular.module("checkoutController",[]);checkoutController.controller("checkoutCtrl",["$scope","$http","$q","$document","notifyUser","Session",function(e,r,o,t,n,s){e.card="undefined"!=typeof sapayol.session.card?sapayol.session.card:{},init=function(){e.address={},null!==sapayol.address&&(e.address=sapayol.address,e.shippingInfoSubmitted=!0,"undefined"!=typeof e.card&&"undefined"!=typeof e.card.id?(e.paymentInfoSubmitted=!0,t.scrollToElement(angular.element("#order-summary"),80,500)):t.scrollToElement(angular.element("#payment-info"),80,500)),null!==sapayol.user&&(e.address.name=sapayol.user.name)},e.submitShippingInfo=function(r){e.shippingInfoForm.$valid?addShippingInfoToOrder(e.address,r).then(function(r){e.shippingInfoSubmitted=!0,t.scrollToElement(angular.element("#payment-info"),80,500)}):e.showShippingErorrs=!0},addShippingInfoToOrder=function(e,t){var s=o.defer();return r.post("/orders/"+t,{_method:"PATCH",name:e.name,address1:e.address1,address2:e.address2,city:e.city,postcode:e.postcode,province:e.province,country:e.country}).success(function(e,r){s.resolve(e)}).error(function(e,r){n.ofApiErrors(e,r)}),s.promise},Stripe.setPublishableKey("pk_test_G2k7gKlVNK1rpGMDeF5FDIhO"),e.stripeResponseHandler=function(r,o){o.error?n.ofErrorMessage(400==r?o.error:o.error.message):(e.card=o.card,e.stripe_token=o.id,s.store({card:e.card}),e.paymentInfoSubmitted=!0,console.log(o))},init()}]);var globalController=angular.module("globalController",[]);globalController.controller("GlobalCtrl",["$rootScope","$document","Session","$scope","notifyUser",function(e,r,o,t,n){e.flushSession=function(){o["delete"]("flush").then(function(){n.of("Session flushed")})},e.getSession=function(){o.getCurrent().then(function(e){console.log(e)})}}]);var lookController=angular.module("lookController",[]);lookController.controller("lookAndFitCtrl",["$scope","$http","$q","Session","$timeout","Auth","notifyUser",function(e,r,o,t,n,s,i){e.jacket=sapayol.jacket,oldInput="undefined"!=typeof sapayol.session[e.jacket.model]?sapayol.session[e.jacket.model]:{},e.jacket.leather_type="undefined"!=typeof oldInput.leather_type?oldInput.leather_type:"lamb heavy",e.jacket.leather_color="undefined"!=typeof oldInput.leather_color?oldInput.leather_color:"black",e.jacket.lining_color="undefined"!=typeof oldInput.lining_color?oldInput.lining_color:"black",e.jacket.hardware_color="undefined"!=typeof oldInput.hardware_color?oldInput.hardware_color:"silver",e.jacket.size="undefined"!=typeof oldInput.size?oldInput.size:44,e.updateSessionCache=function(){var r={};r[sapayol.jacket.model]=e.jacket,t.store(r)},e.submitAuthRequest=function(r){return"logout"===r?logout(e.user):void(e.userInfoForm.$valid?register(e.user):(e.showUserErorrs=!0,focus("emailField")))},e.proceedToOrder=function(){n(function(){createOrderForm.submit()},100)},register=function(r){s.register(r.email,r.password).then(function(r){e.user=r,e.proceedToOrder()})},login=function(r){s.login(r.email,r.password).then(function(r){e.user=r,e.proceedToOrder()})},resetPassword=function(r){s.reset(r.email).then(function(r){i.of(r),e.reset=!1})},logout=function(){s.logout().then(function(e){deleteCurrentUser(),i.of("You were logged out")})}}]);var measurementController=angular.module("measurementController",[]);measurementController.controller("measurementCtrl",["$scope","$timeout",function(e,r){e.measurementFraction=null,e.submitMeasurement=function(r){e.measurementForm[r].$error.min||e.measurementForm[r].$error.max?e.displayMinMaxError=!0:e.measurementForm.$valid&&e.measurementForm.submit()},e.init=function(r){e.measurement=r,e.change(r)},e.change=function(r){e.displayMinMaxError=!1,"undefined"!=typeof r?(result=Math.round(100*r)/100,e.measurement=result,resultEight=Math.round(8*result)/8,e.measurementFraction=getFractionFromDecimal(resultEight)):e.measurementFraction=null},getFractionFromDecimal=function(e){var r=(e%1).toFixed(2);return result="0.13"===r?"1/8":"0.25"===r?"1/4":"0.38"===r?"3/8":"0.50"===r?"1/2":"0.63"===r?"5/8":"0.75"===r?"3/4":"0.88"===r?"7/8":"",parseInt(e)+"  "+result},highestCommonFactor=function(e,r){return 0==r?e:highestCommonFactor(r,e%r)}}]);var factories=angular.module("factories",["globalFactory","sessionFactory","userFactory"]),globalFactory=angular.module("globalFactory",[]);globalFactory.factory("focus",["$rootScope","$timeout",function(e,r){return function(o){r(function(){e.$broadcast("focusOn",o)})}}]);var sessionFactory=angular.module("sessionFactory",[]);sessionFactory.factory("Session",["$http","$q",function(e,r){return session={},session.getCurrent=function(){var o=r.defer();return e.get("/session").success(function(e,r){o.resolve(e)}).error(function(e,r){return e}),o.promise},session.getValueOf=function(o){var t=r.defer();return e.get("/session/"+o).success(function(e,r){t.resolve(e)}).error(function(e,r){return e}),t.promise},session.store=function(o){var t={};angular.forEach(o,function(e,r){t[r]=e});var n=r.defer();return e.post("/session",t).success(function(e,r){n.resolve(e)}).error(function(e,r){return e}),n.promise},session["delete"]=function(o){var t=r.defer();return e["delete"]("/session/"+o,{}).success(function(e,r){t.resolve(e)}).error(function(e,r){return e}),t.promise},session}]);var userFactory=angular.module("userFactory",[]);userFactory.factory("User",["$http","$q","notifyUser",function(e,r,o){var t={},n=["*"],s={type:"object",properties:{title:{type:"string",required:!0,minLength:3,title:"Title",description:"User title"}}};return t.setCurrent=function(e){t=e},t.getCurrent=function(){return t},t.getSchema=function(){return s},t.getForm=function(){return n},t.index=function(t,n,s){var i=r.defer();return e.get("/users?page="+t+n+s).success(function(e,r){i.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),i.promise},t.instructorIndex=function(){var t=r.defer();return e.get("/users?role=instructor").success(function(e,r){t.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),t.promise},t.create=function(t){var n=r.defer();return e.post("/users",{title:t.title}).success(function(e,r){n.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),n.promise},t.update=function(t){var n=r.defer();return e.patch("/users/"+t.id,{title:t.title}).success(function(e,r){n.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),n.promise},t["delete"]=function(t){var n=r.defer();return e["delete"]("/users/"+t.id,{}).success(function(e,r){n.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),n.promise},t.search=function(t,n){var s=r.defer();return e.get("/users?query_type="+t+"&q="+n).success(function(e,r){s.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),s.promise},t.createDsoAccount=function(t){var n=r.defer();return e.post("/users/"+t+"/create_dso_account").success(function(e,r){n.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),n.promise},t}]);var services=angular.module("services",["authenticationService","notificationService"]),authenticationService=angular.module("authenticationService",[]);authenticationService.factory("Auth",["$http","$q","notifyUser",function(e,r,o){var t={};return t.register=function(t,n){var s=r.defer();return e.post("/auth/register",{email:t,password:n}).success(function(e,r){s.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),s.promise},t.login=function(t,n,s){var i=r.defer();return e.post("/auth/login",{email:t,password:n,remember:s}).success(function(e,r){i.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),i.promise},t.reset=function(t){var n=r.defer();return e.post("/password/email",{email:t}).success(function(e,r){n.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),n.promise},t.logout=function(){var t=r.defer();return e.get("/auth/logout").success(function(e,r){t.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),t.promise},t}]);var notificationService=angular.module("notificationService",[]);notificationService.factory("notifyUser",["notify",function(e){return notifyOfValidationError=function(r){angular.forEach(r,function(r,o){var t=new RegExp(o,"i");return r=r[0].replace(t,"<strong>$&</strong>"),template="<span>",template+=r+"<br>",template+="</span>",e({messageTemplate:template,classes:"alert"})})},{ofApiErrors:function(r,o){return"string"==typeof r?e({message:r,classes:alert}):422===o?notifyOfValidationError(r):e(500===o?{message:r.error,classes:"alert"}:{message:r.message,classes:"alert"})},ofErrorMessage:function(r){return e({message:r,classes:"alert"})},ofWarningMessage:function(r){return e({message:r,classes:"warning"})},ofSuccessMessage:function(r){return e({message:r,classes:"success"})},of:function(r){return e(r)}}}]);
//# sourceMappingURL=../maps/main.js.map