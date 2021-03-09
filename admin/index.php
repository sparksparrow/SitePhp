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
                        <td id=content >
                            <h3>Зона администрирования</h3>
                            <p>Для добавления картинки через диалоговое окно следует переместить фото в папку "admin\img\catalog_teas"</p>
                            <p>Фото продуктов хранятся в папках "img\catalog_teas" и в "admin\img\catalog_teas"</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
            <?php include('blocks\footer.php'); ?>      
    </table>
</body>
</html>