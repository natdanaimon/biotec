<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

$body = '<html>
    <head>
        <title>Email From BiotecItlia Thailand</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div> 
            
            <p>&nbsp;&nbsp;เรียนคุณ  &name;</p> 
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &mseeage;

            </p> 
            <br/>
            <p>&nbsp;&nbsp;ด้วยความเคารพอย่างสูง
            </p> 
            

        </div>
        <div>&nbsp;</div>
        <div> 
            <table>
                <tr>
                    <td> <img src="../../images/logo/biotec_th.png" ></td>
                    <td style="vertical-align: center;"> 
                        © Biotec Thailand 2016 | Biotec Thailand srl Viale della Repubblica 20, Dueville (VI), Thailand
                        <br/>
                        Tel : 099-999-9999 , Fax : 02-222-2221 ,  Email : info@BiotecThailand.com
                    </td>
                </tr>
            </table>

        </div>
    </body>
</html>';
$to = "natdanaimon@gmail.com";
$subject = "(Test) BiotecItalia Thailand";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@BiotecItaliaThailand.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);