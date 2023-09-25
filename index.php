<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .wrapper{
            width: 98%;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 200px;
        }
        table tr td{
            width: 150px;
        }

      
    .date-input-group {
        display: flex;
        align-items: center;
    }

    .date-label {
        margin-right: 10px;
        font-weight: bold;
    }

    .date-input {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .search-btn {
        margin-top: 10px;
    }

    </style>


    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
   
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-1 mb-3 clearfix">
                        <div >
                        <img src="https:.svg" alt="kent" width="90" height="58">
                    </div>
        <h2 class="pull-left">Employees Details and Tasks</h2>
                       
    <form class="form-inline justify-content" method="POST" action="search.php">
        <div class="form-group">
            <label for="date1"></label>
            <input type="date" class="form-control" id="date1" name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>" />
        </div>
        <div class="form-group">
            <label for="date2">To:</label>
            <input type="date" class="form-control" id="date2" name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"/>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
    </form>
    <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee & Tasks</a>
                    </div>

                    
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>S.No</th>";
                                    echo "<th>Name</th>";
                                    echo "<th>Employee_Id</th>";
                                    echo "<th>Date</th>";
                                    echo "<th>Task</th>";
                                    echo "<th>Status</th>";
                                    echo "<th>Reporting Manager</th>";
                                    echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    if(date('Y-m-d')== date($row['date'])){
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" .$row['employee_id']."</td>";
                                    echo "<td>" .$row['date']."</td>";
                                    echo "<td>" . $row['address'] . "</td>";
                                    echo "<td>" . $row['salary'] . "</td>";
                                    echo "<td>" . $row['reported_to'] . "</td>";
                                    echo "<td>";
                                            echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                    }
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                    </head>
                    <body>

                    
                        <footer>



                    <span >Created By <a href="https://in.linkedin.com/in/kingsaurabhkushwaha">Saurabh kumar</a> | <span class="far fa-copyright"></span> 2023 All rights reserved.</span>
                    <span >Organization  <a href="https://in.linkedin.com/in/kingsaurabhkushwaha">SAURABH KUMAR</a> | <span class="far fa-copyright"></span> 2023 All rights reserved.</span>
                        
                
              </footer>
                </body>
                    </html>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
