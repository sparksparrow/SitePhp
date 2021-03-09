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
                                $name=trim(strip_tags($_POST['name']));
                                $price=$_POST['price'];
                                $amount=$_POST['amount'];
                                $description=trim(strip_tags($_POST['description']));
                                $image=trim($_POST['image']);

                                if($name!='' && $price!='' && $amount!='' && $image!='')
                                {
                                    $check=mysql_query("SELECT * FROM teas WHERE name='$name' AND price='$price' AND amount='$amount' AND description='$description' AND image='$image'");    

                                    if(!mysql_fetch_array($check))
                                    {
                                        $execute=mysql_query("INSERT INTO teas(name, price, amount, description, image) VALUE('$name', '$price', '$amount', '$description', '$image')");
                                        if($execute)                                
                                            printf( '<p class=back>Продукт успешно добавлен</p>
                                            <br>
                                            <a class=form_change href=add.php?name=%s&price=%s&amount=%s&description=%s&image=%s>Назад</a>',$name, $price, $amount, $description, $image);
                                        else
                                            printf( '<p class=back>Ошибка добавления</p>
                                            <br>
                                           <a class=form_change href=add.php?name=%s&price=%s&amount=%s&description=%s&image=%s>Назад</a>',$name, $price, $amount, $description, $image);
                                    }
                                    else
                                    {
                                        printf( '<p class=back>Данный продукт уже существует</p>
                                        <br>
                                        <a class=form_change href=add.php?name=%s&price=%s&amount=%s&description=%s&image=%s>Назад</a>',$name, $price, $amount, $description, $image);
                                    }
                                }
                                else
                                {
                                    printf( '<p class=back>Обязательные поля не заполнены</p>
                                    <br>
                                    <a class=form_change href=add.php?name=%s&price=%s&amount=%s&description=%s&image=%s>Назад</a>',$name, $price, $amount, $description, $image);
                                }
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