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
                                <h3>Удалить продукт</h3>
                                <?php                                
                                    echo '<ol>';
                                        $result=mysql_query("SELECT * FROM teas");
                                        while($array=mysql_fetch_array($result))
                                        {
                                            printf("<li><a href=result_delete.php?id=%s onclick=confirm_delete();>%s</a></li>",$array['id'] ,$array['name']);
                                        }
                                    echo '</ol>';                                                               
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