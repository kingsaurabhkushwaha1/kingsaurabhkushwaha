<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    </style>

</head>
<body>
    
</body>
</html>


<?php
	require 'config.php';
    

//    echo $_POST['search'];



	if(ISSET($_POST['date1']) && isset($_POST['date2'])){
      
     

		 $date1 = date("Y-m-d", strtotime($_POST['date1']));
	     $date2 = date("Y-m-d", strtotime($_POST['date2']));
		 $query=mysqli_query($link, "SELECT * FROM `employees` WHERE date(`date`) BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
		//$row=mysqli_num_rows($query);
		
        
	
    
        if(mysqli_num_rows($query) > 0){
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
                while($row = mysqli_fetch_assoc($query)){
                    
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
                echo "</tbody>";                            
            echo "</table>";
            
        } else{
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close connection
    mysqli_close($link);
		
	
?>
<?php
    
?>
