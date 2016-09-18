<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
$servername = 'sql9.freesqldatabase.com';
$username = 'sql9136244';
$password = 'VaIM3ICusL';
$databasename = 'sql9136244';
$port = '3306';

/*$connection = mysqli_connect($servername.':'.$port,$username,$password,$databasename);
$sql = "select * from users";
$results = mysqli_query($connection,$sql);


if(mysqli_num_rows($results)>0){
  while ($column=mysqli_fetch_assoc($results)){
    echo $column["email"];
    echo "<br/>";
    echo $column["passwrd"];
    }
  }
    mysql_free_result($results);
$connection->close();
*/

?>


<html>
    <head>
        <title>Welcome to prescription medication's website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body bgcolor="grey">
        <div>
            <!-- Start content -->
            <div>
            <table align="center" bgcolor="white">
   		
            <tr>
                <td>
                Welcome to prescription medication's website. Here is what you can do with this website
                <ul>
                    <li>Finding the information about prescription medication. </li>
                        <li>Sharing your experience of using prescription medication.</li>
                        <li>Learning from other experience of using medication.</li>
                    </ul>
                </td>
            </tr>
            
            <tr>
                <td>
                <div id="piechart" style="width: 100%; height: 100%;"></div>
                </td>
            </tr>
            <tr>
                <td>
                <div id="piechart1" style="width: 100%; height: 100%;"></div>
                </td>
            </tr>
            
            <tr>
            <td>
                Common medicine reviews:
                <ul>
                    <li>Antacids</li>
                    <li>Acid reducers</li>
                    <li>Bulking agents</li>
                    <li>Laxatives</li>
                    <li>Stool softeners</li>
                    <li>Antidiarrheals</li>
                    <li>Cold</li>
                    <li>Allergy remedies</li>
                    <li>Pain relievers</li>
                </ul>
            </td>
            </tr>
            
            <tr colspan = 2 align = "center">
            <?php
            $email = $_REQUEST['email'];
            $passwrd = $_REQUEST['passwrd'];
            $connection = mysqli_connect($servername.':'.$port,$username,$password,$databasename);
            $sql = "select * from users where email=".$email.' and passwrd='.$passwrd;
            //INSERT INTO medicine VALUES (idmedicine,namemedicine,description,image) VALUES (1,asp,asprine,"sadfsdaf sa f","");

            //INSERT INTO userreviewmedcine VALUES (id,namemedicine,description,image) VALUES ();
            echo $sql;
            $results = mysqli_query($connection,$sql);
            if(mysqli_num_rows($results)==0){
              echo '<button><a href="signup.html"></a></button>';
              echo '<button><a href="login.html"></a></button>';
            } else {

            }
               
            ?>
            </tr>
            </table>
    	    </div>
        <!-- END of cell content -->
        
        </div>
    </body>

    
 <!-- Start script of pie charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Reviewer', 'Reviewers per Day'],
          ['Reviewes',     11],
          ['Visitors',      2],
        ]);

        var options = {
          title: 'Number of reviewers'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<!-- End script of piechart charts -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Medicine', 'Percentage of review'],
          ['Antacids',     11],
          ['Acid reducers',      2],
          ['Bulking agents',     11],
          ['Laxatives',      2],
          ['Stool softeners',     11],
          ['Antidiarrheals',      2],
          ['Allergy remedies',      2],
          ['Pain relievers',      2],
        ]);

        var options = {
          title: 'Percentage of reviews per medicine'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>



</html>
