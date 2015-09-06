!function(){"use strict";function e(){var e=$(window).height(),r=parseInt(e)+"px";$(".hero-video-container").css("height",r)}function r(e){$(e).each(function(){$(this).data("height",$(this).height()),$(this).data("width",$(this).width())}),o(e)}function o(e){var r,o,t=$(window).width(),n=$(window).height();$(e).each(function(){var e=$(this).data("height")/$(this).data("width"),s=n/t;e>s?(r=t,o=r*e,$(this).css({top:-(o-n)/2+"px","margin-left":0})):(o=n,r=o/e,$(this).css({"margin-top":0,"margin-left":-(r-t)/2+"px"})),$(this).width(r).height(o),$(".hero-video-container video").addClass("fadeIn animated")})}angular.module("sapayolApp",["controllers","services","directives","factories","duScroll","cgNotify","angularPayments","angular-loading-bar","ngMask"]).run(["$timeout",function(e){e(function(){$(document).ready(function(){$(".jacket-carousel").slick({dots:!0,arrows:!1,mobileFirst:!0,focusOnSelect:!1}),plyr.setup({controls:["play","fullscreen"]}),$(document).foundation(),FastClick.attach(document.body)})},500)}]);$(function(){$("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);if(e=e.length?e:$("[name="+this.hash.slice(1)+"]"),e.length)return $("html,body").animate({scrollTop:e.offset().top},1e3),!1}})}),$(document).ready(function(){e(),r(".hero-video-container .poster img"),r(".hero-video-container .filter"),r(".hero-video-container video"),$(window).on("resize",function(){e(),o(".hero-video-container .poster img"),o(".hero-video-container .filter"),o(".hero-video-container video")})})}();var controllers=angular.module("controllers",["checkoutController","globalController","lookController","measurementController"]),checkoutController=angular.module("checkoutController",[]);checkoutController.controller("checkoutCtrl",["$scope","$http","$q","$document","notifyUser","Session",function(e,r,o,t,n,s){e.card="undefined"!=typeof sapayol.session.card?sapayol.session.card:{},init=function(){e.address={},null!==sapayol.address&&(e.address=sapayol.address,e.addressSubmitted=!0,e.addressDisabled=!0,"undefined"!=typeof e.card&&"undefined"!=typeof e.card.id?(e.paymentInfoSubmitted=!0,e.paymentInfoDisabled=!0,t.scrollToElement(angular.element("#order-summary"),80,500)):t.scrollToElement(angular.element("#address"),80,500)),null!==sapayol.user&&(e.address.name=sapayol.user.name)},e.changePaymentInfo=function(){t.scrollToElement(angular.element("#payment-info"),80,500),e.paymentInfoDisabled=!1,e.card=null,s.store({card:e.card})},e.changeAddress=function(){t.scrollToElement(angular.element("#address"),80,500),e.addressDisabled=!1},e.submitAddress=function(r){e.addressForm.$valid?e.paymentInfoSubmitted?t.scrollToElement(angular.element("#order-summary"),80,500):addAddressToOrder(e.address,r).then(function(r){e.addressSubmitted=!0,e.addressDisabled=!0,t.scrollToElement(angular.element("#payment-info"),80,500)}):e.showAddressErorrs=!0},addAddressToOrder=function(e,t){var s=o.defer();return r.post("/orders/"+t,{_method:"PATCH",name:e.name,address1:e.address1,address2:e.address2,city:e.city,postcode:e.postcode,province:e.province,country:e.country}).success(function(e,r){s.resolve(e)}).error(function(e,r){n.ofApiErrors(e,r)}),s.promise},Stripe.setPublishableKey("pk_test_G2k7gKlVNK1rpGMDeF5FDIhO"),e.stripeResponseHandler=function(r,o){o.error?n.ofErrorMessage(400==r?o.error:o.error.message):(e.card=o.card,e.stripe_token=o.id,s.store({card:e.card}),e.paymentInfoSubmitted=!0,e.paymentInfoDisabled=!0,console.log(o))},init()}]);var globalController=angular.module("globalController",[]);globalController.controller("GlobalCtrl",["$rootScope","$document","Session","$scope","notifyUser",function(e,r,o,t,n){e.flushSession=function(){o["delete"]("flush").then(function(){n.of("Session flushed")})},e.getSession=function(){o.getCurrent().then(function(e){console.log(e)})}}]);var lookController=angular.module("lookController",[]);lookController.controller("lookAndFitCtrl",["$scope","$http","$q","Session","$timeout","Auth","notifyUser",function(e,r,o,t,n,s,i){e.jacket=sapayol.jacket,oldInput="undefined"!=typeof sapayol.session[e.jacket.model]?sapayol.session[e.jacket.model]:{},e.init=function(r,o,t,n){e.jacket.leather_type="undefined"!=typeof oldInput.leather_type?oldInput.leather_type:r,e.jacket.leather_color="undefined"!=typeof oldInput.leather_color?oldInput.leather_color:o,e.jacket.lining_color="undefined"!=typeof oldInput.lining_color?oldInput.lining_color:t,e.jacket.hardware_color="undefined"!=typeof oldInput.hardware_color?oldInput.hardware_color:n},e.updateSessionCache=function(){var r={};r[sapayol.jacket.model]=e.jacket,t.store(r)},e.submitAuthRequest=function(r){return"logout"===r?logout(e.user):void(e.userInfoForm.$valid?register(e.user):(e.showUserErorrs=!0,focus("emailField")))},e.proceedToOrder=function(){n(function(){createOrderForm.submit()},100)},register=function(r){s.register(r.email,r.password).then(function(r){e.user=r,e.proceedToOrder()})},login=function(r){s.login(r.email,r.password).then(function(r){e.user=r,e.proceedToOrder()})},logout=function(){s.logout().then(function(e){deleteCurrentUser(),i.of("You were logged out")})},e.resetPassword=function(){e.userInfoForm.email.$valid?s.reset(e.user.email).then(function(r){i.of(r),e.reset=!1}):e.showUserErorrs=!0}}]);var measurementController=angular.module("measurementController",[]);measurementController.controller("measurementCtrl",["$scope","$timeout",function(e,r){e.measurementFraction=null,e.submitMeasurement=function(o){e.displayMinMaxError=!1,"height"==e.step&&"in"===e.units?(e.measurement=parseInt(12*e.feet)+parseInt(e.inches),r(function(){finalForm.submit()},100)):e.measurementForm[o].$error.min||e.measurementForm[o].$error.max?r(function(){e.displayMinMaxError=!0},100):e.measurementForm.$valid&&finalForm.submit()},e.init=function(r,o,t){e.step=r,e.units=o,e.change(t),"height"==e.step&&"in"===e.units?(e.feet=parseInt(t/12),e.inches=parseInt(t%12)):e.measurement=t},e.change=function(r){e.displayMinMaxError=!1,"undefined"!=typeof r?(result=Math.round(100*r)/100,e.measurement=result,resultEight=Math.round(8*result)/8,""!==getFractionFromDecimal(resultEight)&&(e.measurementFraction=getFractionFromDecimal(resultEight))):e.measurementFraction=null},getFractionFromDecimal=function(e){var r=(e%1).toFixed(2);if("0.13"===r)result="1/8";else if("0.25"===r)result="1/4";else if("0.38"===r)result="3/8";else if("0.50"===r)result="1/2";else if("0.63"===r)result="5/8";else if("0.75"===r)result="3/4";else{if("0.88"!==r)return!1;result="7/8"}return parseInt(e)+"  "+result},highestCommonFactor=function(e,r){return 0==r?e:highestCommonFactor(r,e%r)}}]);var directives=angular.module("directives",["globalDirectives"]),globalDirectives=angular.module("globalDirectives",[]);globalDirectives.directive("scrollToTop",function(){return{restrict:"A",link:function(e,r){r.on("click",function(){$("body").animate({scrollTop:0},"slow")})}}});var factories=angular.module("factories",["globalFactory","sessionFactory","userFactory"]),globalFactory=angular.module("globalFactory",[]);globalFactory.factory("focus",["$rootScope","$timeout",function(e,r){return function(o){r(function(){e.$broadcast("focusOn",o)})}}]);var sessionFactory=angular.module("sessionFactory",[]);sessionFactory.factory("Session",["$http","$q",function(e,r){return session={},session.getCurrent=function(){var o=r.defer();return e.get("/session").success(function(e,r){o.resolve(e)}).error(function(e,r){return e}),o.promise},session.getValueOf=function(o){var t=r.defer();return e.get("/session/"+o).success(function(e,r){t.resolve(e)}).error(function(e,r){return e}),t.promise},session.store=function(o){var t={};angular.forEach(o,function(e,r){t[r]=e});var n=r.defer();return e.post("/session",t).success(function(e,r){n.resolve(e)}).error(function(e,r){return e}),n.promise},session["delete"]=function(o){var t=r.defer();return e["delete"]("/session/"+o,{}).success(function(e,r){t.resolve(e)}).error(function(e,r){return e}),t.promise},session}]);var userFactory=angular.module("userFactory",[]);userFactory.factory("User",["$http","$q","notifyUser",function(e,r,o){var t={},n=["*"],s={type:"object",properties:{title:{type:"string",required:!0,minLength:3,title:"Title",description:"User title"}}};return t.setCurrent=function(e){t=e},t.getCurrent=function(){return t},t.getSchema=function(){return s},t.getForm=function(){return n},t.index=function(t,n,s){var i=r.defer();return e.get("/users?page="+t+n+s).success(function(e,r){i.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),i.promise},t.instructorIndex=function(){var t=r.defer();return e.get("/users?role=instructor").success(function(e,r){t.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),t.promise},t.create=function(t){var n=r.defer();return e.post("/users",{title:t.title}).success(function(e,r){n.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),n.promise},t.update=function(t){var n=r.defer();return e.patch("/users/"+t.id,{title:t.title}).success(function(e,r){n.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),n.promise},t["delete"]=function(t){var n=r.defer();return e["delete"]("/users/"+t.id,{}).success(function(e,r){n.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),n.promise},t.search=function(t,n){var s=r.defer();return e.get("/users?query_type="+t+"&q="+n).success(function(e,r){s.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),s.promise},t.createDsoAccount=function(t){var n=r.defer();return e.post("/users/"+t+"/create_dso_account").success(function(e,r){n.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),n.promise},t}]);var services=angular.module("services",["authenticationService","notificationService"]),authenticationService=angular.module("authenticationService",[]);authenticationService.factory("Auth",["$http","$q","notifyUser",function(e,r,o){var t={};return t.register=function(t,n){var s=r.defer();return e.post("/auth/register",{email:t,password:n}).success(function(e,r){s.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),s.promise},t.login=function(t,n,s){var i=r.defer();return e.post("/auth/login",{email:t,password:n,remember:s}).success(function(e,r){i.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),i.promise},t.reset=function(t){var n=r.defer();return e.post("/password/email",{email:t}).success(function(e,r){n.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),n.promise},t.logout=function(){var t=r.defer();return e.get("/auth/logout").success(function(e,r){t.resolve(e)}).error(function(e,r){o.ofApiErrors(e,r)}),t.promise},t}]);var notificationService=angular.module("notificationService",[]);notificationService.factory("notifyUser",["notify",function(e){return notifyOfValidationError=function(r){angular.forEach(r,function(r,o){var t=new RegExp(o,"i");return r=r[0].replace(t,"<strong>$&</strong>"),template="<span>",template+=r+"<br>",template+="</span>",e({messageTemplate:template,classes:"alert"})})},{ofApiErrors:function(r,o){return"string"==typeof r?e({message:r,classes:alert}):422===o?notifyOfValidationError(r):e(500===o?{message:r.error,classes:"alert"}:{message:r.message,classes:"alert"})},ofErrorMessage:function(r){return e({message:r,classes:"alert"})},ofWarningMessage:function(r){return e({message:r,classes:"warning"})},ofSuccessMessage:function(r){return e({message:r,classes:"success"})},of:function(r){return e(r)}}}]);
//# sourceMappingURL=../maps/main.js.map