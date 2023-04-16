<?php



// mysqli_connect နဲ့ မရေးတော့ဘဲ နောက်တစ်နည်းရေးတာ။ 
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'todo-app');


// mysql နဲ့ php error တွေတက်ခဲ့ရင် မြင်ရအောင်  option တွေထည့်ပေးတာ
// PDO ဆိုတာ mysqli တို့ကနေ update ထုတ်ပေးလိုက်တာ security အတွက် ပိုကောင်းတယ်
// PDO သုံးရင် SQL injection တို့ automatic ကာကွယ်ပေးနိုင်တယ်။  

// error ဖမ်းဖို့ 
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

// database connection ချိတ်တာ (pdo = php data objects)
// $dsn is data source name, ဆိုလိုတာက connection ချိတ်ဖို့ လိုအပ်တဲ့ database အချက်လက်ကိုထည့်ခိုင်းတာ
// PDO('database information', username, password)
$pdo = new PDO(
    // "mysql:host=localhost;dbname=todo-app", MYSQL_USER, MYSQL_PASSWORD, $options,
    "mysql:host=". MYSQL_HOST. ";dbname=". MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD, $options
);



