<?php
include('header.php');
checkUser();
adminArea();

if (isset($_GET['type']) && $_GET['type'] == 'delete' && isset($_GET['id']) && $_GET['id'] > 0) {
    $id = get_safe_value($_GET['id']);
    mysqli_query($con, "delete from category where id=$id");
    echo "<br/>Data deleted<br/>";
}

$res = mysqli_query($con, "select * from category order by id desc");
?>
<script>
    setTitle("Category");
    selectLink('category_link');
</script>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Category</h2>
                    <a href="manage_category.php">Add category</a>
                    <br/><br/>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($res) > 0) { ?>
                                    <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td>
                                                <a href="manage_category.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
                                                <a href="javascript:void(0)" onclick="deleteConfirm('<?php echo $row['id']; ?>','category.php')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="3">No data found</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>

<script>
    function deleteConfirm(id, page) {
        var check = confirm("Are you sure?");
        if (check == true) {
            window.location.href = page + "?type=delete&id=" + id;
        }
    }
</script>
