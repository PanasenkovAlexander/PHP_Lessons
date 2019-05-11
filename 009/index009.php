<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson009</title>
</head>
<body>


    <?php

        class DbHelper {
            private $db_resource;
            private $last_error = null;

            public function __construct($login, $password, $host, $db) {
                $this->db_resource = mysqli_connect($host, $login, $password, $db);
                if (!$this->db_resource){
                    $this->last_error = mysqli_connect_error();
                }
            }

            public function executeQuery($sql){
                $rec = mysqli_query($this->db_resource, $sql);
                return $res;
            }

            public function getLastError(){
                return $this->last_error;
            }

            public function getLastId(){
                return mysqli_insert_id($this->db_resource);
            }
        }

        $dbHelper = new DbHelper("root", "", "localhost", "giftube");

        if(!$dbHelper->getLastError()) {
            $dbHelper->executeQuery("SELECT * FROM gifs");
        } else {
            print($dbHelper->getLastError);
        }


    ?>

    <?php //SwiftMailer

        $transport = new Swift_SmtpTransport('smtp.example.org', 25);

        $message = new Swift_Message("Просмотры вашей гифки");
        $message->setTo(['keks@htmlacademy.ru' => 'Кекс']);
        $message->setBody("Гифку посмотрели более 1 мил раз");
        $message->setForm("mail@gif.ac", "GifTube");

        $mailer = new Swift_Mailer($transport);
        $mailer->send($message);

    ?>

    <?php //GUMP
        require 'vendor/autoload.php';

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_len,8',
            'login' => 'required|alpha_numeric';
            'phone' => 'phone_number'
        ];

        $gump = new GUMP('ru');
        $gump->validation_rules($rules);
        $validated_data = $gump->run($_POST);

        if(!$validated_data) {
            $errors = $gump->get_arrors_array();
        } else {
            // форма прошла валидацию
        }
        
    ?>

    <?php //Imagine

        $imagine = new Imagine\Gd\Imagine();

        $cat = $imagine->open('./keks.jpg');
        $watermark = $imagine->open('./logo.png');

        $size = $cat->getSize();
        $wSize = $watermark->getSize();
        $bottomRight = new Imagine\Image\Point($size->getWidth() - $wSize->getwidth()), $size->getHeight() - $wSize->getHeight());
        $cat->paste($watermark, $bottomRight);
        $cat->save('newcat.png');

    ?>
    
</body>
</html>