<?php 
    include('blocks\connect_db.php');
    $result=mysql_query("SELECT * FROM settings WHERE page='product_view.php'");
    $array=mysql_fetch_array($result);
?>

<html>
<head>
    <meta charset='utf-8'>
    <link rel ='stylesheet' href='style.css'/>
    <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
    <script src="product_view.js"></script>
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
                        	<?php
                        	$id=$_REQUEST['id'];
                        	$result=mysql_query("SELECT * FROM teas WHERE id='$id'") ;
                        	$array=mysql_fetch_array($result);
                        	printf("
                        		<div> 
                        			<img src='%s' alt='%s' width=300px height=300px>
                        			<p>%s</p>
                        			<p>%s &#8381;</p>
                        			<p>В наличии: <span id=amount>%s</span></p>
                        			<p>Описание: %s</p>
                        		</div>
                                <br>
                            <form id=no_enter action=result_add.php method=POST>
                                <input id=amount_to_add type=number value=1 min=1 max=%s></input>
                                <button class=button type=button onclick=add_to_cart(%s)>Добавить в корзину</button>
                            </form>", $array['image'],$array['name'],$array['name'], $array['price'], $array['amount'], $array['description'], $array['amount'], $id);
                        	?>                           
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
            <?php include('blocks\footer.php'); ?>      
    </table>
</body>
</html>