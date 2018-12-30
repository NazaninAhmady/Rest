<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.min.js"></script>
    <script src="https://cdn.auth0.com/js/auth0/9.5.1/auth0.min.js"></script>
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
        News Lead : <a href="files/{{News.News_Lead}}" target="_blank">{{News.News_Lead}}</a><br>
        News Desc : <a href="files/{{News.News_Desc}}" target="_blank">{{News.News_Desc}}</a><br>
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
                "font-size": "12px",
                "padding": "50px"
            }
        });
    </script>

    <div ng-init="BackColour='LightBlue' ">


        <h1 align="center" style="font-size:60px; width: ">Internship</h1>
        <br>
        <br>


        <form action="../FirstPage.php" method="post" enctype="multipart/form-data">


            <table style="with:400px;   background-color: mistyrose" align="center" border="1">
                <tr>
                    <td style="padding-top: 20px; padding-bottom: 5px; padding-right: 10px; padding-left: 10px">
                        NewsTitle: <input type="text" name="News_Title"
                                          style="background-color: {{BackColour}}; width: 300px;">

                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 20px; padding-bottom: 5px; padding-right: 10px; padding-left: 10px">
                        NewsLead: <input type="file" name="fileToUpload1" style="width: 300px; b">
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 20px; padding-bottom: 5px; padding-right: 10px; padding-left: 10px">
                        NewsDesc: <input type="file" name="fileToUpload2" ;>
                        <br>
                        <br>

                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit"/>


                    </td>
                </tr>
            </table>

        </form>

    </div>

    <?php
}
?>
</body>
</html>
