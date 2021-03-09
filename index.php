<?php 
    include('blocks\connect_db.php');
    $result=mysql_query("SELECT * FROM settings WHERE page='index.php'");
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
                            <h3>Добро пожаловать в чайный магазин</h3>
                            <img src=img\website_decorations\welcome.jpg width=1000px height=800px style="margin: 5px;border: 2px solid black;" alt='Tea'/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
            <?php include('blocks\footer.php'); ?>      
    </table>
</body>
</html>