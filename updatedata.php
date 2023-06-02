<?php session_start();
if(!isset($_SESSION["username"])){
    header("Location:login.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<?php
    require_once "conn.php";
    if(isset($_POST["name"]) && isset($_POST["grade"]) && isset($_POST["marks"]) && isset($_POST['lecturer'])){
        $name = $_POST['name'];
        $grade = $_POST['grade'];
        $marks = $_POST['marks'];
        $lecturer = $_POST['lecturer'];
        $sql = "UPDATE results SET `name`= '$name', `class`= '$grade', `marks`= $marks, `lecturer` = '$lecturer' WHERE id= ".$_GET["id"];
        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <p><a href="logout.php">Logout</a></p>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Update Data</h1>
        <div class="container">
            <?php 
                require_once "conn.php";
                $sql_query = "SELECT * FROM results WHERE id = ".$_GET["id"];
                if ($result = $conn ->query($sql_query)) {
                    while ($row = $result -> fetch_assoc()) { 
                        $Id = $row['id'];
                        $Name = $row['name'];
                        $Grade = $row['class'];
                        $Marks = $row['marks'];
                        $Lecturer = $row['lecturer'];
            ?>
                            <form action="updatedata.php?id=<?php echo $Id; ?>" method="post">
                                <div class="row">
                                        <div class="form-group col-lg-2">
                                            <label for="">Student Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $Name ?>" required>
                                        </div>
                                        <div class="form-group  col-lg-2">
                                            <label for="">Grade</label>
                                            <select name="grade" id="grade" class="form-control" required >
                                                <option value="">Select a Grade</option>
                                                <option value="grade1" <?php if($Grade == "grade1"){ echo "Selected"; } ?> >Grade 1</option>
                                                <option value="grade2" <?php if($Grade == "grade2"){ echo "Selected"; } ?> >Grade 2</option>
                                                <option value="grade3" <?php if($Grade == "grade3"){ echo "Selected"; } ?> >Grade 3</option>
                                                <option value="grade4" <?php if($Grade == "grade4"){ echo "Selected"; } ?> >Grade 4</option>
                                                <option value="grade5" <?php if($Grade == "grade5"){ echo "Selected"; } ?> >Grade 5</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label for="">Marks</label>
                                            <input type="text" name="marks" id="marks" class="form-control" value="<?php echo $Marks ?>" required>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label for="">Lecturer</label>
                                            <input type="text" name="lecturer" id="lecturer" class="form-control" value="<?php echo $Lecturer ?>" required>
                                        </div>
                                        <div class="form-group col-lg-4" style="display: grid;align-items:  flex-end;">
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                                        </div>
                                </div>
                            </form>
            <?php 
                    }
                }
            ?>
        </div>
    </section>
</body>

</html>