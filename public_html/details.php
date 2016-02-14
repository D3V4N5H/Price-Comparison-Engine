<?php
ini_set("display_errors",1);
$request = "http://www.pricetree.com/dev/api.ashx?pricetreeId=".$_REQUEST['id']."&apikey=7770AD31-382F-4D32-8C36-3743C0271699";
$response = file_get_contents($request);
$results = json_decode($response, TRUE);
?>



<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Detail</title>


<link rel="stylesheet" href="css/bootstrape1.css" integrity=		"sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link rel="stylesheet" href="css/bootstrape2.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">

<script src="javascript/bootstrape.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<style>
	.table thead tr.info > th {
  background-color: #ddd;
}
	
</style>
<body class="back1">
<div class="container" style="background-color:#FFFFFF; border-radius:25px; padding-top:30px; margin-top:30px">
<center>
	<table class="table">
        <thead>
            <tr class="info">
                <th>Store Name</th> <th>Price</th> <th>URL</th>
            </tr>
        </thead>
        <tbody id="price-list">
            <!-- Data will be appended here -->
            <?php
for($i=0;$i<count($results['data']);$i++)
{
	$data=$results['data'][$i];
	echo "<tr>
		<td class='store'>
			<strong>"
			.$data['Seller_Name'].
			"</strong>
		</td>
		<td class='price'>
		Rs. ".$data['Best_Price'].
		"</td>
		<td class='uri'>
		<a target='_blank' href=".$data['Uri'].">Go to Store</a>
		</td>
	</tr>
	";
}
?>
        </tbody>
	</table>
    </center>
    
    </div>
</body>
</html>
