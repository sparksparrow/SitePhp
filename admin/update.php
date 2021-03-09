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
                            <h3>Изменить продукт<h3>
                            <?php
                                if (!(isset($_GET['id'])))
                                {
                                    echo '<ol>';
                                        $result=mysql_query("SELECT * FROM teas");
                                        while($array=mysql_fetch_array($result))
                                        {
                                            printf("<li><a href=update.php?id=%s>%s</a></li>",$array['id'] ,$array['name']);
                                        }
                                    echo '</ol>';
                                }
                                else
                                {
                                    $id=$_GET['id']; 
                                    $result=mysql_query("SELECT * FROM teas WHERE id='$id'");
                                    $array=mysql_fetch_array($result);
print<<<HERE
<form action=result_update.php method=POST>
								<p>
									Название продукта<br>
									<input class=form_change type=text size=60 name=name value="$array[name]">
								</p>
								<p>
									Цена продукта<br>
									<input class=form_change type=text size=60 name=price value=$array[price]>
								</p>
								<p>
									Количество продукта<br>
									<input class=form_change type=text size=60 name=amount value=$array[amount]>
								</p>
								<p>
									Описание продукта<br>
									<textarea id=form_change_textarea type=text size=60 name=description>$array[description]</textarea>
								</p>
								<p>
									Фото продукта<br>
									<input class=form_change id=path_image type=text size=60 name=image value="$array[image]">
                                    <button class=button type=button onclick=choose_file()>Выбрать</button>
								</p>
								<p>
									<input class=button type=reset value='Очистить форму'>
									<input class=button type=submit value='Обновить продукт'>
								</p>
                                <input type=hidden name=id value=$array[id]>
							</form>
HERE;
                                }
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