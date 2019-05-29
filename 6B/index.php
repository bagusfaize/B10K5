<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database Management App</title>
    <link href="https://fonts.googleapis.com/css?family=Muli:200,300,400,600,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-center h-100">
        <div class="d-flex flex-column">
        <p class="h4">Database Management App</p>
            <!-- INPUT PROGRAMMER -->
            <form action="input_programmer.php" method="post">
            <div class="box px-5 py-3 my-5 w-100">
                <div class="row justify-content-between">
                    <div class="col-9">
                    <input type="text" name="name" class="form-control mx-3 w-100" placeholder="Input programmer's name">
                </div>
                    <div class="col">
                    <input class="btn btn-bulet float-right mr-3" type="submit" value="Add">
                    </div>
                </div>
            </div>
            </form>
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
            <div class="box px-5 py-4 my-2 w-100">
                <div class="row justify-content-between">
                    <div class="col-7">
                        <span class="d-block nama my-1"><?php echo $data['programmer']?></span>
                        <span class="skill"> Skills : 
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
                        </span>
                        </div>
                    <div class="col">                    
                    <form method="post" action="input_skill.php" class="form-inline ml-3 mt-2">
                    <input type="text" class="form-control mx-2 w-50" name="name" placeholder="Input skills">
                    <input type="text" value="<?php echo $data['id']?>" name="id" class="form-control mx-2 w-25" style="display:none;">
                    <input type="text" value="<?php echo $data['id']?>" name="id" class="form-control mx-2 w-25" style="display:none;">
                    <input class="btn btn-bulet float-right" type="submit" value="Add">
                    </div>
                    </form>
                </div>
            </div>
            <?php
            }
            ?>
</div>
</body>
</html>
