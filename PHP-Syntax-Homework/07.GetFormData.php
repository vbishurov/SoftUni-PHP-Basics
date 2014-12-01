<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        td {
            float: left;
            width: 100px;
            border: 1px solid black;
            text-align: right;
        }
        td.identifier {
            background-color: orange;
            border-right: 0;
            text-align: left;
        }
    </style>
</head>
<body>
<form action="07.GetFormData.php" method="post">
    <input type="text" name="name"/><br/><br/>
    <input type="text" name="age"/><br/><br/>
    <input type="radio" name="sex" value="male"/>
    <label for="sex">Male</label><br/>
    <input type="radio" name="sex" value="female"/>
    <label for="sex">Female</label><br/>
    <input type="submit" name="submit"/>
    <?php
        formProcessor();
    ?>
</form>
</body>
</html>
<?php
function formProcessor() {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    if ($_POST['submit']) {
        echo "<p>My name is $name. I am $age years old. I am $sex</p>";
    }
}
?>