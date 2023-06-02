<?php session_start();
if(!isset($_SESSION["username"])){
    header("Location:login.php");
    exit();
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <p><a href="logout.php">Logout</a></p>
    <section>
    <h1 style="text-align: center; margin: 50px 0">
    Crud application
    </h1>
    <div class="container">
        <form action="adddata.php" method="post">
            <div class="row">
                <div class="form-group col-lg-2">
                    <label for="">Student name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group col-lg-2">
                    <label for="">grade</label>
                    <select name="grade" id="grade" class = "form-control">
                        <option value="">select grade</option>
                        <option value="grade 1">grade 1</option>
                        <option value="grade 2">grade 2</option>
                        <option value="grade 3">grade 3</option>
                        <option value="grade 4">grade 4</option>
                        <option value="grade 5">grade 5</option>
                    </select>
                </div>
                <div class="from-group col-lg-2">
                    <label for="">Marks</label>
                    <input type="number" name="marks" id="marks" class="form-control" require>
               </div>
               <div class="form-group col-lg-2">
                    <label for="">Lecturer</label>
                    <input type="text" name="lecturer" id="lecturer" class="form-control" required>
                </div>
                    <div class="form-group col-lg-4" style="display: grid; align-items: flex-end;">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="+ ADD">
                </div>
 
            </div>
        </form>
    </div>
    </section>
    <section style="margin: 50px 0">
    <div class="container">
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Student name</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Marks</th>
                    <th scope="col">lecturer</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "conn.php";
                $sql_query="SELECT * FROM results";
                if($result=$conn->query($sql_query)){
                    while($row=$result->fetch_assoc()){
                        $ID=$row['id'];
                        $Name = $row['name'];
                        $Grade = $row['class'];
                        $Marks = $row['marks'];
                        $Lecturer = $row['lecturer'];
 
                ?>
                <tr class="trow">
                    <td><?php echo $ID; ?></td>
                    <td><?php echo $Name; ?></td>
                    <td><?php echo $Grade; ?></td>
                    <td><?php echo $Marks; ?></td>
                    <td><?php echo $Lecturer; ?></td>
                    <td><a href="updatedata.php?id=<?php echo $ID; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="deletedata.php?id=<?php echo $ID; ?>" class="btn btn-primary">Delete</a></td>
 
                </tr>
                <?php
                    }
                }
                ?>
 
            </tbody>
        </table>
    </div>
 
    </section>
 
 
</body>
</html>