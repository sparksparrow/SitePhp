<?php 
    include('blocks\connect_db.php');
    $result=mysql_query("SELECT * FROM settings WHERE page='catalog.php'");
    $array=mysql_fetch_array($result);
?>

<html>
<head>
    <meta charset='utf-8'>
    <link rel ='stylesheet' href='style.css'/>
	<script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
    <script src="show_cart.js"></script>
    <title><?php echo $array['title']; ?></title>
</head>
<body>
    <table id=main_table>
        <tr>
            <?php include('blocks\header.php'); ?>
        </tr>
        <tr>
            <td id=table_menu_content>
                <table>
                    <tr>                        
                        <?php include('blocks\menu.php'); ?>                         
						<td id=content>
							<h3>Каталог</h3>
							<table id=catalog>
							<?php
								$result = mysql_query('SELECT * FROM teas');
								$index_colum = 3;
								$flag = true;
								while($array=mysql_fetch_array($result))
								{
									if($index_colum % 4 == 0)
									{				
										printf('</tr>');
									}
									$index_colum+=1;
						
									if($index_colum % 4 == 0)
									{
										$index_colum/=4;
										printf('<tr>');
									}
									printf("
									<td>
										<a href=product_view.php?id=%s>
											<div> 
												<img src='%s' alt='%s' width=300px height=300px>
												<p>%s</p>
												<p>%s &#8381;</p>
											</div>
										<a>
									</td>",$array['id'], $array['image'],$array['name'],$array['name'], $array['price']);			
								}
								?>
							</table>
						</td>
                    </tr>
                </table>
            </td>
        </tr>
            <?php include('blocks\footer.php'); ?>      
    </table>
</body>
</html>