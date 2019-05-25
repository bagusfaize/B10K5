<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arkademy</title>
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <div class="container pt-5">
        <div class="d-flex align-items-center justify-content-center h-100">
        <div class="d-flex flex-column">
            <!-- INPUT PROGRAMMER -->
            <div class="box px-5 py-3 my-5">
            <form method="post" action="input_programmer.php" class="form-inline">
            <input type="text" name="name" class="form-control mx-3 w-75" placeholder="Input nama programmer">
            <input class="btn btn-info" type="submit">
            </form>
            </div>
            <!-- TAMPILAN DATABASE -->

            <?php
            include 'koneksi.php';
            $query = "SELECT users.id, (users.name) AS programmer, (skills.name) AS skill
            FROM users JOIN skills
            ON users.id = skills.user_id
            GROUP BY users.id";
            $sql = mysqli_query($koneksi, $query);
            while($data = mysqli_fetch_assoc($sql)){
            $pk=$data['id'];
            ?>           
            <div class="box px-5 py-3 my-1 w-100">
            <table class="table my-3">
            <tr>
                <td class="w-50"><?php echo $data['programmer']?></td>
                <td>
                    <form method="post" action="input_skill.php" class="form-inline">
                    <span class="mt-4">
                    <input type="text" class="form-control mx-2 w-50" name="name" placeholder="Input skill">
                    <input type="text" value="<?php echo $data['id']?>" name="id" class="form-control mx-2 w-25" style="display:none;">
                    <input type="submit" class="btn btn-info" placeholder="Tambah">
                    </span>
                    </form>
                </td>
            </tr>
            <tr>
            <td>
                <?php
                include 'koneksi.php';
                $queryskill = "SELECT * FROM skills where user_id = '$pk'";
                $keahlian = mysqli_query($koneksi, $queryskill);
                while($list = mysqli_fetch_array($keahlian)){
                    ?>
                <?php echo $list['name']."," ?>
                <?php
                }                
                ?>                
            </td>
            </tr>
            </table>
            </div>

            <?php
            }
            ?>

        </div>
        </div>
    </div>
</div>
</body>
</html>


