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
    <?php
        tableGenerator('Gosho', '0882-321-423', 24, 'Hadji Dimitar');
    ?>
    <br><br><br>
    <?php
    tableGenerator('Pesho', '0884-888-888', 67, 'Suhata Reka');
    ?>
</body>
</html>
<?php
function tableGenerator($name, $phone, $age, $address) {
    echo "<table>";
    echo "<tr><td class=\"identifier\">Name</td><td>$name</td></tr>";
    echo "<tr><td class=\"identifier\">Phone number</td><td>$phone</td></tr>";
    echo "<tr><td class=\"identifier\">Age</td><td>$age</td></tr>";
    echo "<tr><td class=\"identifier\">Address</td><td>$address</td></tr>";
    echo "</table>";
}
?>