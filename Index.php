<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.min.js"></script>
</head>
<body ng-app="MyObject" ng-controller="MyContoller2"  ng-style="MyObj">
<?php
$api=$_GET['api'];
$api_array=explode( "/", $api);
//die(var_dump($api_array));
$id=$api_array[1];
if(!empty($id)) {?>
    <div>
        News Id : {{News.News_ID}} <br>
        News Title : {{News.News_Title}} <br>
        News Lead : {{News.News_Lead}} <br>
        News Desc : {{News.News_Desc}} <br>
    </div>
    <script>
        var MyModule = angular.module("MyObject", []);

        MyModule.controller('MyContoller2', function ($scope, $http) {
            $http.get("../../showNews.php?id=<?=$id?>")
                .then(function (response) {
                    $scope.News = response.data;
                });
        });
    </script>
    <?php
}else{
?>
    <script>
        var app = angular.module("MyObject", []);
        app.controller("MyContoller2", function ($scope) {
            $scope.MyObj = {
                "color": "Black",
                "background-color": "Pink",
                "font-size": "12px",
                "padding": "50px"
            }
        });
    </script>

    <div ng-init="BackColour='LightBlue' ">


        <h1 align="center" style="font-size:60px">Internship</h1>


        <form action="../FirstPage.php" method="post"  enctype="multipart/form-data">

            NewsTitle:<input type="text" name="News_Title"  style="background-color: {{BackColour}}">
            <br>
            <!--        -->
            <!--        <p>-->
            <!--            FileName2:<input type="text" name="FileName2" ng-model="FileName2" style="background-color: {{BackColour}}">-->
            <!--            <br>-->
            <!--        <p>Second File for Uploading is <span ng-bind="FileName2"></span></p>-->
            <!--        </p>-->


            NewsLead: <input type="file" name="fileToUpload1">
            <br><br>
            NewsDesc: <input type="file" name="fileToUpload2">
            <br><br>
            <input type="submit" name="Submit">
        </form>

    </div>

<?php
}
?>
</body>
</html>

