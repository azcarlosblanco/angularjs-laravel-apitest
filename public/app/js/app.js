(function () {

    'use strict';
    // use strict mode = run script in strict mode meant for eg., you cannot use undeclared variables;

    angular
        .module('authApp', ['ui.router', 'satellizer'])//according to module export. eg module.exports = 'satellizer'; in satellizer.js
        .config(function ($stateProvider, $urlRouterProvider, $authProvider) {


            // Satellizer configuration that specifies which API
            // route the JWT should be retrieved from
            $authProvider.loginUrl = '/api/authenticate';

            // Redirect to the auth state if any other states
            // are requested other than users

            $urlRouterProvider
                .otherwise('auth');

            $stateProvider
                .state('auth', {
                    url: '/auth',
                    templateUrl: 'app/view/authView.html',
                    controller: 'AuthController as auth'
                })
                .state('book', {
                    url: '/book/:routeName',
                    templateUrl: 'app/view/book.html',
                    controller: 'commonController as book'
                    // or //
                    // can use with closure method as follow ;
                    //controller: function ($stateParams, $scope) {
                    //    // If we got here from a url of /contacts/42
                    //    // expect($stateParams).toBe({contactId: "42"});
                    //    //console.log($stateParams);
                    //    var baseURL = 'http://angular_book.app/api/v1/';
                    //    switch ($stateParams.routeName) {
                    //        case ':author' :
                    //            $scope.form_title = 'Author Section';
                    //            $scope.bookactive = 'active';
                    //            baseURL += 'author';
                    //            break;
                    //        case ':genre' :
                    //            $scope.form_title = 'Genre Section';
                    //            baseURL += 'genre';
                    //            break;
                    //        case 'book' :
                    //            $scope.form_title = 'Book Section';
                    //            $scope.authoractive = 'active';
                    //            var authorURL = baseURL + 'authorList';
                    //            var genreURL = baseURL + 'genreList';
                    //            baseURL += 'book';
                    //            alert(baseURL);
                    //    }
                    //}
                })
                .state('author', {
                    url: '/author/:routeName',
                    templateUrl: 'app/view/author.html',
                    controller: 'commonController as author'
                })
                .state('genre', {
                    url: '/genre/:routeName',
                    templateUrl: 'app/view/genre.html',
                    controller: 'commonController as genre'
                })
                .state('logout', {
                    url: '/logout',
                    //templateUrl: 'app/view/authView.html',
                    controller: function ($state, $auth) {
                        $auth.logout().then(function () {
                            localStorage.removeItem('user');
                        });
                        $state.go('auth');
                    }

                });
        });
})();