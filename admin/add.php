<?php 
    include('blocks\connect_db.php');
    $result=mysql_query("SELECT * FROM settings WHERE page='admin'");
    $array=mysql_fetch_array($result);
?>

<html>
<head>
    <meta charset='utf-8'>
    <link rel ='stylesheet' href='style.css'/>
	<script src="scripts.js"></script>
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
                        <td id=content >
							<h3>Добавить продукт<h3>
							<?php
								$name=$_REQUEST['name'];
                                $price=$_REQUEST['price'];
                                $amount=$_REQUEST['amount'];
                                $description=$_REQUEST['description'];
                                $image=$_REQUEST['image'];

							?>

							<form action=result_add.php method=POST>
								<p>
									Название продукта<br>
									<input class=form_change type=text size=60 name=name value=<?php echo $name?> >
								</p>
								<p>
									Цена продукта<br>
									<input class=form_change type=text size=60 name=price value=<?php echo $price?> >
								</p>
								<p>
									Количество продукта<br>
									<input class=form_change type=text size=60 name=amount value=<?php echo $amount?> >
								</p>
								<p>
									Описание продукта<br>
									<textarea id=form_change_textarea  placeholder="Описание" type=text size=60 name=description><?php echo $description?></textarea>
								</p>
								<p>
									Фото продукта<br>
									<input class=form_change id=path_image type=text size=60 name=image value=<?php echo $image?> >
									<button class=button type=button onclick=choose_file()>Выбрать</button>
								</p>
								<p>
									<input class=button type=reset value='Очистить форму'>
									<input class=button type=submit value='Добавить продукт'>
								</p>
							</form>
						</td>
                    </tr>
                </table>
            </td>
        </tr>
            <?php include('blocks\footer.php'); ?>      
    </table>
</body>
</html>