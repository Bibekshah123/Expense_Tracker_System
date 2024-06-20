<?php
include('header.php');
checkUser();
userArea();
include('user_header.php');

if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id']) && $_GET['id']>0){
    $id=get_safe_value($_GET['id']);
    mysqli_query($con,"delete from expense where id=$id");
    echo "<br/>Data deleted<br/>";
}

$res=mysqli_query($con,"select expense.*,category.name from expense,category  where expense.category_id=category.id and expense.added_by='".$_SESSION['UID']."'
order by expense.expense_date asc");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Expense</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        h2 {
            color: #333;
        }
        a {
            color: #0066cc;
            text-decoration: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2>Expense</h2>
<a href="manage_expense.php">Add Expense</a>
<br/><br/>
<?php
if(mysqli_num_rows($res)>0){
?>

<table>
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Item</th>
        <th>Price</th>
        <th>Details</th>
        <th>Expense Date</th>
        <th>Actions</th>
    </tr>
    <?php while($row=mysqli_fetch_assoc($res)){?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['item']?></td>
        <td><?php echo $row['price']?></td>
        <td><?php echo $row['details']?></td>
        <td><?php echo $row['expense_date']?></td>
        <td>
            <a href="manage_expense.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp;
            <a href="javascript:void(0)" onclick="delete_confir('<?php echo $row['id'];?>','expense.php')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<?php } 
    else{
        echo "No data found";
    }
?>

</body>
</html>

<?php
include('footer.php');
?>
