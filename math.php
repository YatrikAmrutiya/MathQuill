<!DOCTYPE html>
<html>
<head>
	<title>Math quill demo</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
	</script>
   <link rel="stylesheet" type="text/css" href="./css/mathquill.css">
   <script src="./js/mathquill.min.js"></script>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script type="text/javascript" id="MathJax-script" async
  	src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js">
	</script>
</head>
<body>
<?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $dbname = 'mathquill';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully<br>';
         $sql = 'SELECT equ FROM mathequ';
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               echo "\(".$row["equ"]."\)";
               echo "<br>";
            }
         } else {
            echo "0 results";
         }
         mysqli_close($conn);
      ?>

</body>
</html>
