<?php
// PHP array
$books = array(
    array(
        "title" => "Professional JavaScript",
        "author" => "Nicholas C. Zakas"
    ),
    array(
        "title" => "JavaScript: The Definitive Guide",
        "author" => "David Flanagan"
    ),
    array(
        "title" => "High Performance JavaScript",
        "author" => "Nicholas C. Zakas"
    )
);

echo "test";
?>

<html>



<body>

	<div id="print"></div>


<script type="text/javascript">
// pass PHP array to JavaScript 
var books = <?php echo json_encode($books, JSON_PRETTY_PRINT) ?>;

// output using JSON_PRETTY_PRINT
/* var books = [ // outer level array literal
    { // second level object literals
        "title": "Professional JavaScript",
        "author": "Nicholas C. Zakas"
    },
    {
        "title": "JavaScript: The Definitive Guide",
        "author": "David Flanagan"
    },
    {
        "title": "High Performance JavaScript",
        "author": "Nicholas C. Zakas"
    }
]; */

// how to access 
//console.log( books[1].author ); // David Flanagan
document.getElementById('print').innerHTML = books[1].author;


</script>
	
	
</body>

</html>

