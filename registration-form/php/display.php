<?php
require 'connection.php';

?>


<!-- this part can be differ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Users</title>
    <style>
        img{
            height:50px;
            width:50px;
        }

        table{
            width:60vw;
            border:1px solid;
            margin:auto;
        }

        table tr{
            display:flex;
            justify-content:space-around;
            border:1px solid;
        }

        
    </style>
</head>
<body>
    <h2>These are my gang members.</h2>
    
    <table>
        <thead>
            <tr>
                <td>S No.</td>
                <td>Name</td>
                <td>Picture</td>
            </tr>
        </thead>

        <tbody>
           



                    
    <?php
        
    
        // this is the select query
        $query = "select * from registered_users";

        // // Now fire select query

        $all_data = mysqli_query($con,$query);
        // echo mysqli_num_rows($all_data);

        // $all_data = mysqli_fetch_array($all_data);

        // echo "<pre>";
        // echo var_dump($all_data);
        // echo "</pre>";

        // echo $res_data[1];

        // echo $all_data['email'];


        $num = 1;
        while ($all = mysqli_fetch_array($all_data)) {
            ?>
            <tr>
            <td><?php echo $num; ;?></td>
            <td><?php echo $all['fname']; ?></td>
            <td><img src="../uploaded-images/<?php echo $all['photo']; ?>" alt=""></td>
            </tr>
            <?php
            $num++;
        }


?>



            
        </tbody>
    </table>

    


</body>
</html>
