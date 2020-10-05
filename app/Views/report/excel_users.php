<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Users.xls");
?>

<html>

<body>
    <table border="1">
        <thead>
            <tr>
                <th width="1px">No</th>
                <th width="10px">Image</th>
                <th width="auto">Name</th>
                <th width="auto">Email</th>
                <th width="auto">Username</th>
                <th width="10px">Level</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($users as $row) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><img src="/assets/img/users/<?= $row['image']; ?>" class="imageList"></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['level']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>