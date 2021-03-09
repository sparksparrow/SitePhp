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
                                $id=$_REQUEST['id'];
                                    $execute=mysql_query("DELETE FROM teas WHERE id='$id'");
                                    if($execute)                                
                                        printf( '<p class=back>Продукт успешно удалён</p>
                                        <br>
                                        <a class=form_change href=delete.php?name=%s&price=%s&amount=%s&description=%s&image=%s>Назад</a>',$name, $price, $amount, $description, $image);
                                    else
                                        printf( '<p class=back>Ошибка удаления</p>
                                        <br>
                                       <a class=form_change href=delete.php?name=%s&price=%s&amount=%s&description=%s&image=%s>Назад</a>',$name, $price, $amount, $description, $image);                                
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