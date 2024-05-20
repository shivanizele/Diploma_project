 <?php ?>

 <!DOCTYPE html>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.button {
  display: inline-block;
  padding: 10px 22px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 5px #999;
  margin-left: 200px;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
</head>
<?php include('templates/header.php') ?>
 <?php include('config.php') ?>
<div class="main-section">
  <div class="row h-100" >
    <div  class="col-2">
   <?php include("Tabs.php"); ?>
    </div>
    <div class="col">

<div>
 <hr>
<h3>List Of Regular Courses</h3>
 <hr>
 </div>

<table>
  <tr>
    <th>Sr.No</th>
    <th>Code</th>
    <th>Course name</th>
    <form >
    <th>TH</th>
    <th>PR</th>
    <th>OR</th>
    <th>TW</th>
  </tr>
  <tr>
    <td>1</td>
    <td>CM3103</td>
    <td>Java Programming -I</td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td></td>
    <td><input type="checkbox"></td>
  </tr>
  <tr>
  <td>2</td>
    <td>CM3103</td>
    <td>Data Structure</td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td></td>
    <td><input type="checkbox"></td>  </tr>
  <tr>
  <td>3</td>
    <td>IT3103</td>
    <td>Data Communication And Networking</td>
    <td></td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
  <tr>
  <td>4</td>
    <td>CM4105</td>
    <td>Professional Practices -II</td>
    <td></td>
    <td></td>
    <td></td>
    <td><input type="checkbox"></td>
  </tr>
  <tr>
  <td>5</td>
  <td>CM4106</td>
    <td>Web Developement Using Javascript</td>
    <td></td>
    <td><input type="checkbox"></td>
    <td></td>
    <td><input type="checkbox"></td>
    
  </tr>
  <tr>
  <td>6</td>
    <td>MA4101</td>
    <td>Entrepreneurship  And Startups</td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td>7</td>
    <td>CM5103</td>
    <td>Programming Uing PHP</td>
    <td><input type="checkbox"></td>
    <td><input type="checkbox"></td>
    <td></td>
    <td><input type="checkbox"></td>
  </tr>
</table>
<br>

</form>
<button class="button">Submit</button>
    </div>
    </body>
</html>