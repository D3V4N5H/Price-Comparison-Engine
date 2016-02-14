<?php
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://www.pricetree.com/search.aspx?q=".$_REQUEST['q']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$icerik = curl_exec($ch);
	$p1=explode('<div id="data-style" class="items-list">',$icerik);
	$p2=explode('<ul>',$p1[1]);
	$p3=explode('</ul>',$p2[1]);
	
	$images=$links=$names=$ids=array();
	//Img
	$p4=explode('<img class="lazy" data-original="',$p3[0]);
	for($i=1;$i<count($p4);$i++)
	{
		$img=explode('"',$p4[$i]);
		$images[$i]=$img[0];
	}
	
	//URL
	$p4=explode('<a href="',$p3[0]);
	for($i=1;$i<count($p4);$i++)
	{
		$link=explode('"',$p4[$i]);
		$name=explode('/',$link[0]);
		$name=explode('-price-',$name[count($name)-1]);
		$names[$i]=ucwords(str_replace('-',' ',$name[0]));
		$ids[$i]=$name[1];
		$links[$i]=$link[0];
	}
	
//	print_r($p3[0]);
	curl_close($ch);
	
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="css/style.css">
</head><!--/head-->

<body class="back1">
	<div class="row" style="margin-top:10px">
    	<div class="col-md-12">
        	<center>
            <form action="search.php" method="post" role="form">
            		<input type="text" class="form-control txt2" placeholder="Example : Mobile Tablet Laptop Cameras Television" name="q" />
                  <input type="submit" name="submit" value="Search" style="opacity:0" />
            </form>
            </center>
        </div>
    </div>

		<section>
		<div class="container" style="background-color:#FFFFFF; margin-top:50px; border-radius:25px;">
			<div class="row">
    			<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
					
                    <?php	
                        for($i=1;$i<count($names);$i++)
                        {
					?>
                    
                    	<div class="col-sm-2" style="margin-top:30px;">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										
                                        
											<?php
                                                 echo "<a href='details.php?id=".$ids[$i]."' target='_blank'>
                                                        <img src='".$images[$i]."' style='height:200px'>
														<h6>".$names[$i]."</h6>
                                                        
														</a>";
											?>
                                            
									</div>
								</div>
							</div>
						</div>
                        
                     <?php
                         } 
					?>
					
                        
                        
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	


  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>




