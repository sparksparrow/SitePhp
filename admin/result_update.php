<?php 
    include('blocks\connect_db.php');
    $result=mysql_query("SELECT * FROM settings WHERE page='admin'");
    $array=mysql_fetch_array($result);
?>

<html>
<head>
    <meta charset='utf-8'>
    <link rel ='stylesheet' href='style.css'/>
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
                        <td>
                            <?php
                                $id=$_POST['id'];
                                $name=trim(strip_tags($_POST['name']));
                                $price=$_POST['price'];
                                $amount=$_POST['amount'];
                                $description=trim(strip_tags($_POST['description']));
                                $image=trim($_POST['image']);

                                if($name!='' && $price!='' && $amount!='' && $image!='')
                                {  
                                    $execute=mysql_query("UPDATE teas SET name='$name', price='$price', amount='$amount', description='$description', image='$image' WHERE id='$id'");
                                    if($execute)                                
                                        printf( '<p class=back>Продукт успешно обновлён</p>
                                        <br>
                                        <a class=form_change href=update.php?name=%s&price=%s&amount=%s&description=%s&image=%s>Назад</a>',$name, $price, $amount, $description, $image);
                                    else
                                        printf( '<p class=back>Ошибка обновления</p>
                                        <br>
                                       <a class=form_change href=update.php?name=%s&price=%s&amount=%s&description=%s&image=%s>Назад</a>',$name, $price, $amount, $description, $image);
                                }
                                else                                
                                    printf( '<p class=back>Обязательные поля не заполнены</p>
                                    <br>
                                    <a class=form_change href=update.php>');                                
                            ?> 
                        <td>
                    </tr>
                </table>
            </td>
        </tr>
            <?php include('blocks\footer.php'); ?>      
    </table>
</body>
</html>