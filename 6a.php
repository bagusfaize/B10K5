<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL</title>
</head>
<body>
    <?php

    include 'koneksi.php';

    $query = "SELECT (users.name) AS programmer , (SELECT COUNT(skills.name) FROM skills WHERE skills.user_id = users.id) AS jumlah_skill
    FROM users JOIN skills
    ON users.id = skills.user_id 
    GROUP BY users.id";

    $sql = mysqli_query($koneksi, $query);
    while($data = mysqli_fetch_array($sql)){
        ?>
        <table border="1">
        <tr>
            <td>nama programmer</td>
            <td>jumlah skill</td>
        </tr>
        <tr>
            <td><?php echo $data['programmer']?></td>
            <td><?php echo $data['jumlah_skill']?></td>
        </tr>
        </table>
    <?php
    }
    ?>
    
</body>
</html>