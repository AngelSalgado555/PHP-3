<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . "/PC/PcDAO.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/PC/UserDAO.php";

        // $pc = new Pc("asus129", "andrea", "Asus", 1364.1);

        // $c1 = new Component("ssd", "samsung", "58H");
        // $c2 = new Component("ram", "samsung", "W56");
        // $c3 = new Component("mouse", "logitech", "asd");

        // $pc -> addComponent($c1);
        // $pc -> addComponent($c2);
        // $pc -> addComponent($c3);

        // //Lo añado a la BD
        // PcDAO::create($pc);

        // echo PcDAO::select("asus129");

        $u = new User("sete", "admin12345678-:!");
        $u2 = new User("diego", "a");

        // UserDAO::create($u);
        // UserDAO::create($u2);

        echo UserDAO::verifyPassword("sete", "admin12345678-:!"); 
        echo UserDAO::verifyPassword("diego", "ashdhfasjkd");
        echo UserDAO::verifyPassword("angel", "pepito");
    ?>
</body>
</html>