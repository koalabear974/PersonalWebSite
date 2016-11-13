var app = angular.module('mainApp', ['ngCookies', 'ngResource']); 

app.service('translationService', function($resource) {  
    this.getTranslation = function($scope, language) {
        var languageFilePath = 'lang/translation_' + language + '.json';
        $resource(languageFilePath).get(function (data) {
            $scope.translation = data;
        });
    };
});

app.controller('mainController',['$scope', '$cookies', 'translationService', function ($scope, $cookies, translationService){
	this.getLang = function () {
		return $cookies.get('lang');
	};

	this.setLang = function (lang) {
		if(lang == "fr" || lang == "en"){
			$cookies.put('lang', lang);
		}else {
			$cookies.put('lang', "en");
		}
	}

	

	if(this.getLang() == undefined){
		var userLang = navigator.language || navigator.userLanguage; 
		this.setLang(userLang);
	}

	translationService.getTranslation($scope, this.getLang());  




}]);


