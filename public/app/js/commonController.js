(function () {

    //'use strict';
    angular
        .module('authApp')
        .controller('commonController', commonController)
        .factory('dataFactory', function ($http) {
            return {
                getData: function (parseURL) {
                    return $http({
                        url: parseURL,
                        method: 'GET'
                    })
                }
            }
        });

    function commonController($scope, $stateParams, dataFactory, $state, $http) {
        //console.log($stateParams);
        var baseURL = 'http://angular_book.app/api/v1/';
        console.log($stateParams.routeName);

        switch ($stateParams.routeName) {
            case ':author' :
                $scope.form_title = 'Author Section';
                $scope.bookactive = 'active';
                baseURL += 'author';
                break;
            case ':genre' :
                $scope.form_title = 'Genre Section';
                baseURL += 'genre';
                break;
            case 'book':
                $scope.form_title = 'Book Section';
                $scope.authoractive = 'active';
                var authorURL = baseURL + 'authorList';
                var genreURL = baseURL + 'genreList';

                dataFactory.getData(authorURL).success(function (data) {
                    $scope.authors = data;
                });
                dataFactory.getData(genreURL).success(function (data) {
                    $scope.genres = data;
                });
                baseURL += 'book';
                break;

        }


        // viewing list;
        dataFactory.getData(baseURL).success(function (data) {
            $scope.datas = data;
        }).error(function (data) {
            $scope.Error = true;
            $scope.ErrorText = data.error;
            $state.go('auth');
            console.log(data.error);
        });

        // viewing adding and editing form;
        $scope.toggle = function (state, id) {
            $scope.state = state;

            switch ($scope.state) {
                case 'add' :
                    $scope.form_title = 'Add New Data';
                    $scope.data = {};
                    break;

                case 'edit' :
                    $scope.form_title = 'Update Data';
                    $scope.id = id;

                    dataFactory.getData(baseURL+'/'+id).success(function (data) {
                        $scope.data = data;
                    }).error(function (data) {
                        console.log(data);
                    });
                    //$http.get(baseURL + '/' + id).
                    //    success(function (response) {
                    //        $scope.data = response;
                    //    }).error(function (response) {
                    //        console.log(response);
                    //    });
                    break;
            }
            $('#myModal').modal('show');
        };

        // storing and updating data
        $scope.save = function (state, id) {

            $scope.state = state;
            if (state == 'edit') {
                baseURL += '/' + id;
            }
            $http({
                method: 'POST',
                url: baseURL,
                data: $.param($scope.data),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function (response) {
                console.log(response);
                location.reload();
            }).error(function (response) {
                console.log(response);
                alert('something went wrong');
            })
        };


        //delete data
        $scope.cfmDelete = function (id) {
            var cfm = confirm('Are you sure to delete ?');

            baseURL += '/' + id;

            if (cfm) {
                $http({
                    method: 'DELETE',
                    url: baseURL
                }).success(function (response) {
                    console.log(response);
                    location.reload();
                }).error(function (response) {
                    console.log(response);
                    alert('failed to delete');
                })
            }
        }

    }

})();