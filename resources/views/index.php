<!DOCTYPE html>
<html>
<!--<head>-->
<!--    <script src="--><?//= asset('app/source/js/angular.js') ?><!--"></script>-->
<!--    <script src="--><?//= asset('app/source/js/angular-route.js') ?><!--"></script>-->
<!--    <script src="--><?//= asset('app/source/js/jquery.min.js') ?><!--"></script>-->
<!--    <script src="--><?//= asset('app/js/app.js') ?><!--"></script>-->
<!--    <link rel="stylesheet" href="--><?//= asset('app/source/css/bootstrap.min.css'); ?><!--">-->
<!--    <script src="--><?//= asset('app/source/js/bootstrap.min.js') ?><!--"></script>-->
<!---->
<!--</head>-->
<!---->
<!--<div ng-include="'app/view/nav.html'"></div>-->
<!--<body ng-app="bookApp">-->
<!---->
<!--<div class="container-fluid">-->
<!--    <div class="panel panel-default">-->
<!--        <div class="panel-body">-->
<!--            <ng-view></ng-view>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->
<!--</body>-->

<head>
    <meta charset="utf-8">
    <title>Angular-Laravel Authentication</title>
    <script src="<?= asset('app/source/js/jquery.min.js') ?>"></script>
    <link rel="stylesheet" href="--><?= asset('app/source/css/bootstrap.min.css'); ?>">
     <script src="<?= asset('app/source/js/bootstrap.min.js') ?>"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>

<div ng-include="'app/view/nav.html'"></div>

<body ng-app="authApp">

<div class="container">
    <div ui-view></div>
</div>

</body>

<!-- Application Dependencies -->
<script src="node_modules/angular/angular.js"></script>
<script src="node_modules/angular-ui-router/release/angular-ui-router.js"></script>
<script src="node_modules/satellizer/satellizer.js"></script>

<!-- Application Scripts -->
<script src="app/js/app.js"></script>
<script src="app/js/authController.js"></script>
<script src="app/js/commonController.js"></script>
</html>