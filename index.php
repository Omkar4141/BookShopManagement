
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Shop</title>
    <style>
        form{
            border:2px solid black;
            margin-left: 400px;
            margin-right: 400px;
            background-color: pink;
        }
        td{
            margin-left: 100px;
        }
        h1{
            text-align: center;
            background-color: sienna;
            border: 2px solid black;
        }
        font{
            margin-left: 200px;
        }
        h4{
            background-color: aquamarine;
        }
        p{
            margin-left: 220px;
           
            
        }
        div{
            margin-left:500px;
        }
        
    </style>
</head>
<body>
    <form name="f1" method="post" action="">
        <h4 align="center">Designed By &copy; Omkar Lokhande
        </h3>
        <h1>Book Shop</h1>
        <table>
            <tr>
                <td><font size="4"><b>Book_ID</b></font></td>
                <td> <input type="number" name="t1" ></td>
            
            </tr>

            <tr><td><font size="4"><b>Book_Name</b></font></td>
                <td> <input type="text" name="t2" ></td></tr>
                <tr><td><font size="4"><b>Book_Author</b></font></td>
                <td> <input type="text" name="t3" ></td></tr>
                <tr><td><font size="4"><b>Book_Price</b></font></td>
                    <td> <input type="number" name="t4" ></td></tr>
                    <tr><td><font size="4"><b>Book_Quantity</b></font></td>
                        <td> <input type="number" name="t5" ></td></tr>
                      


        </table>
                            <p><input type="submit" name="insert" value="Insert">
                            <input type="submit" name="update" value="Update">
                            <input type="submit" name="delete" value="Delete">
                            <input type="submit" name="display" value="Display">
                            </p>

                       
</form>
<h5 align="center"> * Note :- For update operation you can update only book price by prioviding book id.</h5>
<?php  
    $host="localhost";
    $user="root";
    $password="";
    $db="bookstore";
    $con=mysqli_connect($host,$user,$password,$db);
    if($con)
    {
    echo "";
    }
    else
    {
    echo "Problem While Connecting to Database ";
    }
    if(isset($_POST['insert']))
    {
        $id=$_POST['t1'];
        $name=$_POST['t2'];
        $author=$_POST['t3'];
        $price=$_POST['t4'];
        $quantity=$_POST['t5'];
        $query="INSERT INTO data(bid,bname,bauthor,bprice,bqty) VALUES('$id','$name','$author','$price','$quantity')";
        $data=mysqli_query($con,$query);
        if($data)
        {
            ?>
            <script type="text/javascript">
            alert("Data Inserted Sucessfully...!");
            </script>
            <?php
            
            

        }
        else{
            ?>
            <script type="text/javascript">
            alert("Try Again...!");
            </script>
            <?php
        }
       
    }
    else if(isset($_POST['update']))
    {
        $id=$_POST['t1'];
        $price=$_POST['t4'];
        
        $query="UPDATE data SET bprice='$price' WHERE bid='$id'";
        $data=mysqli_query($con,$query);
        if($data)
        {
            ?>
            <script type="text/javascript">
            alert("Data Updated Sucessfully");
            </script>
            <?php

        }
        else{
            ?>
          
            <script type="text/javascript">
            alert("Try Again");
            </script>
            <?php
        
        }
    }
    else if(isset($_POST['delete']))
    {
        $id=$_POST['t1'];
      
        $query="DELETE FROM data WHERE bid='$id'";
        $data=mysqli_query($con,$query);
        
        if($data)
        {
            ?>
            <script type="text/javascript">
            alert("Data Deleted Sucessfully...!");
            </script>
            <?php

        }
        
        else{
            ?>
            <script type="text/javascript">
            alert("Try Again");
            </script>
            <?php
           
        }
    }
    else{
        ?>
        <div><table border="1px" cellpadding="10px" cellspacing="0">
            <tr >
                <th colspan="5">BOOK SHOP DETAILS</th>
                <tr>

            <tr>
                <th>Book_ID</th>
                <th>Book_Name</th>
                <th>Book_Author</th>
                <th>Book_Price</th>
                <th>Book_Quantity</th>
    </tr></div>
    <?php
    $query="SELECT * FROM data";
    $data=mysqli_query($con,$query);
    $result=mysqli_num_rows($data);
    if($result){
        while($row=mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $row['bid']; ?></td>
                <td><?php echo $row['bname']; ?></td>
                <td><?php echo $row['bauthor']; ?></td>
                <td><?php echo $row['bprice']; ?></td>
                <td><?php echo $row['bqty']; ?></td>
        </tr>
        <?php
                
        }
    }
    }

?>
</body>
</html>
