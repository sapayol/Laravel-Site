var services = angular.module('services', ['notificationServices']);

var notificationServices = angular.module('notificationServices', []);

notificationServices.factory('notifyUser', ['notify', function(notify) {

	notifyOfValidationError = function(data) {
		angular.forEach(data, function(error, val) {
			var searchTextRegExp = new RegExp(val , "i");
			error            = error[0].replace(searchTextRegExp , '<strong>$&</strong>'),
			template         = "<span>",
			template         += error + '<br>',
			template         += "</span>";
	  	return notify({ messageTemplate: template, classes: 'alert' });
	  });
	}

	return {
		ofApiErrors: function(response, status) {
			if (typeof(response) == 'string') {
				return notify({ message: response, classes: alert });
			};
			if (status === 422) {
				return notifyOfValidationError(response);
			} else if (status === 500) {
				return notify({ message: response.error, classes: 'alert' });
			} else {
				return notify({ message: response.message, classes: 'alert' });
			}
		},
		ofErrorMessage: function(error) {
			return notify({ message: error, classes: 'alert' });
		},
	  ofWarningMessage: function(data) {
			return notify({ message: data, classes: 'warning' });
	  },
		ofSuccessMessage: function(data) {
			return notify({ message: data, classes: 'success' });
	  },
		of: function(data) {
	  	return notify(data);
		}
	}

}]);
