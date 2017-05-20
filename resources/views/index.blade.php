<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <title>Angular js</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body ng-controller="TodosContoller">
    <h1>Todo <small ng-if='remaining()'>([[ remaining() ]] remaining)</small></h1>
    <input type="text" placeholder="Filter todos" ng-model="search"/>
    <ul>
        <li ng-repeat="todo in todos|filter:search">
            <input type="checkbox" ng-model="todo.completed"/>
            [[ todo.body ]]
        </li>
    </ul>
    <form ng-submit="addTodo()">
      {{ csrf_field() }}
        <input type="text" name="body" placeholder="Add New Task" ng-model="item"/>
        <input type="submit" name="completed" value="Submit"/>
    </form>
    <pre>Enter item which is not there in list</pre>
    <script>
         angular.module('myApp', [])
        .constant("CSRF_TOKEN", '{{ csrf_token() }}')
        .config(function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        })
        .controller('TodosContoller', function($scope, $http, CSRF_TOKEN) {
            $http.get('/todos').success(function(todos){
                console.log(todos);
                $scope.todos = todos;
            });
            // $scope.todos = [
            //     {body:'Go to store', completed:true},
            //     {body:'Finish video', completed:false},
            //     {body:'Learn Angular', completed:false}
            // ];
            $scope.remaining = function(){
                var count = 0;
                angular.forEach($scope.todos, function(todo){
                    count += todo.completed? 0:1;
                });
                return count;
            }
            $scope.addTodo = function(){
                var todo = {body:$scope.item, completed:false};
                console.log(CSRF_TOKEN);
                $scope.todos.push(todo);
                $http.post('todos',todo)
                    .success(function(data){
                      console.log(data);
                })
                .error(function(){
                    console.log('error');
                });
                $scope.item="";
            }

            // $scope.addTodo = function(){
            //   var todo = {body:$scope.item, completed:false};
            //   $http({
            //     method: 'POST',
            //     url: 'todos',
            //     headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
            //     data: $.param(todo)
            //   }).then(function successCallback(response) {
            //     console.log(todo);
            //     console.log(response);
            //   }, function errorCallback(response) {
            //     console.log('error');
            //   });
            // }
        });

    </script>
</body>
</html>
