<?php 
    include('blocks\connect_db.php');
    $result=mysql_query("SELECT * FROM settings WHERE page='cart.php'");
    $array=mysql_fetch_array($result);
?>

<html>
<head>
    <meta charset='utf-8'>
    <link rel ='stylesheet' href='style.css'/>
    <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
    <script src="cart.js"></script>
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
                            <h3>Корзина</h3>
                            <div class=main_cart>
                                <?php      
                                $reg = "/\D/";
                                $flag = false;
                                foreach($_COOKIE as $key => $value)  {  
                                    printf(" %s ",preg_match($reg,trim($key)));
                                         if (preg_match($reg,trim($key)) || preg_match($reg,trim($value)))
                                            continue; 
                                         $flag = true;
                                         break;
                                            }
                                if($flag){
                                echo '<table id=cart_table>';
                                    echo '<tr>
                                            <td></td>
												<td><p>Название</p></td>
												<td><p>Цена</p></td>
                                                <td>Количество</td>
                                                <td>Цена позиции</td>
                                            
                                          </tr>';
                                    $total = 0;                                    
                                    foreach($_COOKIE as $key => $value)  {   
                                         if (preg_match($reg,trim($key)) || preg_match($reg,trim($value)))
                                            continue;                                        
                                        $result = mysql_query("SELECT * FROM teas WHERE id='$key'");
                                        $array=mysql_fetch_array($result);
                                        $total+=$value*$array['price'];
                                        printf("
									<tr>
												<td><img src='%s' alt='%s' width=300px height=320px></td>
												<td><p>%s</p></td>
												<td><p>%s &#8381;</p></td>
                                                <td>%s шт.</td>
                                                <td>%s &#8381</td>
									</tr>", $array['image'],$array['name'],$array['name'], $array['price'], $value, $array['price']*$value);
                                        }
                                echo '</table>';
                                printf("<p>Итого: %s &#8381</p></br> ",$total);
                                printf("         
                                <form action=cart.php method=POST>
                                      <button class=button type=submit onclick=clear_cart()>Очистить корзину</button>
                                      <button class=button type=submit onclick=buy(%s) >Купить</button>
                                </form>",$total);
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
            <?php include('blocks\footer.php'); ?>      
    </table>
</body>
</html>