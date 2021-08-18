<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Топливо</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="main.php">Автомобили</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="fuel.php">Топливо</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="transmission.php">Коробка передач</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="drive.php">Привод</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="brand.php">Марка</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="engine.php">Двигатель</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="body.php">Кузов</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid" style="display: flex; flex-direction: column; margin-top: 10px">
    <?php include 'db.php'; ?>
    <?php include 'functions.php'; ?>
    <?php
    $fuel = getAllFuel($db);
    ?>
    <input class="form-control" type="text" placeholder="Поиск по таблице" id="search-text" onkeyup="tableSearch()" style="width: 200px; align-self: flex-end; margin-bottom: 10px">
    <table class="table table-bordered table_sort" id="table">
        <thead>
        <tr>
            <th>id</th>
            <th>Топливо</th>
        </tr>
        </thead>
        <?php foreach ($fuel as $fl) { ?>
            <tr>
                <td><?php echo $fl['id_fuel']; ?></td>
                <td><?php echo $fl['fuel_name']; ?></td>
            </tr>
        <?php } ?>

    </table>
    <form method="POST" role="form" id="add">
        <div class="form-group">
            <label>Введите тип топлива</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Введите значение">
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
    <form class="form2" method="POST" role="form" id="changeRemove" style="display: none">
        <div class="form-group form2">
            <label class="form2">Введите тип топлива</label>
            <input type="text" class="form-control form2" id="change" name="change">
            <input type="hidden" name="idRow" id="idRow">
        </div>
        <button type="submit" name="update_button" class="btn btn-primary form2">Сохранить изменения</button>
        <button type="submit" name="delete_button" class="btn btn-danger form2">Удалить строку</button>
    </form>
    <?php
        if(isset($_POST['name']) && $_POST['name'] != '')
        {
            $name = $_POST['name'];
            writeToСharacteristics($db, 'type_of_fuel', $name);
        }
    ?>
    <?php
    if(isset($_POST['change']) && $_POST['change'] != '')
    {
        $name = $_POST['change'];
        $id = $_POST['idRow'];
        if (isset($_POST['update_button'])) {
            changeCharacteristics($db, 'type_of_fuel', $name, $id);
        } else if (isset($_POST['delete_button'])) {
            deleteFromCharacteristics($db, 'type_of_fuel', $id);
        }
        else {
            var_dump($name);
        }
    }
    ?>
</div>

<script src="js/sript.js"></script>
</body>
</html>
