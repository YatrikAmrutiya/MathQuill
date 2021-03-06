<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mathquill";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo "<br>";
echo "Your LaTeX  :  ".$_POST["equas"];
echo "<br>";
$equation = $_POST["equas"];

$sql = "INSERT INTO `mathequ` (`equ`) VALUES('$equation')";
$icheck = mysqli_query($conn , $sql);
if(! $icheck ) {
      die('Could not enter data: ' . mysqli_error($conn));
   }
echo "Entered data successfully\n"; 
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Math quill demo</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/mathquill.css">
	<script src="./js/mathquill.min.js"></script>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script type="text/javascript" id="MathJax-script" async
  	src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js">
	</script>
</head>
<body>
	<p>Type math here: <span id="math-field" editable="false">\int{e^x}</span></p>
	<p>LaTeX of what you typed: <span id="latex"></span></p>
	<form method="POST" action="<?php $_PHP_SELF ?>">
		<input type="hidden" id="equas" name="equas" value="">
		<input type="submit" name="name" value="submit">
	</form>

</body>
</html>

<script>

function escapes(str) {
	var newstr =""
  for(i = 0; i < str.length; i++)
		if(str[i] == "\\")
		newstr = newstr + "\\\\";
		else
		newstr = newstr + str[i];
		return newstr;
}

var mathFieldSpan = document.getElementById('math-field');
var latexSpan = document.getElementById('latex');
var MQ = MathQuill.getInterface(2); // for backcompat
var mathField = MQ.MathField(mathFieldSpan, {
  spaceBehavesLikeTab: true, // configurable
  handlers: {
    edit: function() { // useful event handlers
      latexSpan.innerHTML = mathField.latex(); // simple API
      document.getElementById('equas').value = escapes(document.getElementById('latex').innerHTML);
    }
  }
})
</script>