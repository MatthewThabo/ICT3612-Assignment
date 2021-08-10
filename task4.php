<!DOCTYPE html>
<html>
<head>
    <title>Task 4</title>
    <style>
        table {
            border-collapse: separate;
        }
        th, td {
            border: 2px solid red;
            padding: 14px;
            text-align: left;
        }
    </style>
</head>

<body>
<?php
    include 'menu.inc';

    echo "
            <table>
                <tr>
                    <th>Tables Names</th><th>Primary Key</th><th>Foreign Key</th>
                </tr>
                <tr>
                    <td>Customers</td><td>CustomerID</td><td>None</td>
                </tr>
                <tr>
                    <td>Employees</td><td>EmployeeID</td><td>None</td>
                </tr>
                <tr>
                    <td>Shippers</td><td>ShipperID</td><td>None</td>
                </tr>
                <tr>
                    <td>Suppliers</td><td>SupplierID</td><td>None</td>
                </tr>
                <tr>
                    <td>Categories</td><td>CategoryID</td><td>None</td>
                </tr>
                <tr>
                    <td>Orders</td><td>OrderID</td><td>CustomerID, EmployeeID, ShipperID</td>
                </tr>
                <tr>
                    <td>OrderDetails</td><td>OrderID</td><td>ProductID</td>
                </tr>
                <tr>
                    <td>Products</td><td>ProductID</td><td>SupplierID, CategoryID</td>
                </tr>
            </table>
            <br /><br />  
        ";
?>
<iframe src="task4.txt" height="400" scrolling="yes" width="1200px">
    <p>Your browser does not support iframes.</p></iframe>
</body>
</html>