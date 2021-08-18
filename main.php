<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Автомобили</title>
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
    $automobiles = getAllAuto($db);
    ?>
    <input class="form-control" type="text" placeholder="Поиск по таблице" id="search-text" onkeyup="tableSearch()"
           style="width: 200px; align-self: flex-end; margin-bottom: 10px">
    <label for="searchCheck" style="width: 150px; align-self: flex-end; margin-bottom: 10px">
        <a class="btn-light btn" onclick="showFilters()" id="searchButton">Сложный поиск</a>
    </label>
    <input type="checkbox"  id="searchCheck" style="display: none">

    <table class="table table-bordered table_sort" id="table">
        <tr class="table-filters" style="display: none" id="table-filters">
            <td>
                <input class="form-control" type="text" style="width: 50px"/>
            </td>
            <td>
                <input class="form-control" type="text" style="width: 80px"/>
            </td>
            <td>
                <input class="form-control" type="text" style="width: 70px"/>
            </td>
            <td>
                <input class="form-control" type="text" style="width: 50px"/>
            </td>
            <td>
                <input class="form-control" type="text" style="width: 80px"/>
            </td>
            <td>
                <input class="form-control" type="text" style="width: 80px"/>
            </td>
            <td>
                <input class="form-control" type="text" style="width: 70px"/>
            </td>
            <td>
                <input class="form-control" type="text" style="width: 80px"/>
            </td>
            <td>
                <input class="form-control" type="text" style="width: 70px"/>
            </td>
            <td>
                <input class="form-control" type="text" style="width: 80px"/>
            </td>
            <td>
                <input class="form-control" type="text" style="width: 90px"/>
            </td>
        </tr >
        <thead>
        <tr>
            <th>id</th>
            <th>Марка</th>
            <th>Модель</th>
            <th>Двигатель</th>
            <th>Кузов</th>
            <th>Топливо</th>
            <th>Коробка передач</th>
            <th>Привод</th>
            <th>Цена</th>
            <th>Цвет</th>
            <th>Дата производства</th>
        </tr>
        </thead>
        <?php foreach ($automobiles as $auto) { ?>
            <tr class="table-data">
                <td><?php echo $auto['id_auto']; ?></td>
                <td><?php echo $auto['brand_name']; ?></td>
                <td><?php echo $auto['model']; ?></td>
                <td><?php echo $auto['engine_displacement']; ?></td>
                <td><?php echo $auto['body_type']; ?></td>
                <td><?php echo $auto['fuel_name']; ?></td>
                <td><?php echo $auto['type_of_transmission']; ?></td>
                <td><?php echo $auto['type_of_drive']; ?></td>
                <td><?php echo $auto['cost']; ?></td>
                <td><?php echo $auto['color']; ?></td>
                <td><?php echo $auto['date_of_manufacture']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <form method="POST" role="form" id="add">
        <div class="form-group">
            <div class="row" style="justify-content: space-between; align-items: flex-end">
                <div class="col-1">
                    <label for="">Выберите марку</label>
                    <select name="brand-1" class="btn btn-light">
                        <?php
                        $brands = getAllBrands($db);
                        foreach ($brands as $brand) {
                            echo "<option value = " . $brand[id_brand] . ">$brand[brand_name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1">
                    <label for="">Введите модель</label>
                    <input type="text" class="form-control" name="model-1" placeholder="Введите значение">
                </div>
                <div class="col-1">
                    <label for="">Литраж двигателя</label>
                    <select name="engine-1" class="btn btn-light">
                        <?php
                        $engines = getAllEngines($db);
                        foreach ($engines as $engine) {
                            echo "<option value = " . $engine[id_engine] . ">$engine[engine_displacement]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1">
                    <label for="">Выберите кузов</label>
                    <select name="body-1" class="btn btn-light">
                        <?php
                        $bodies = getAllBodies($db);
                        foreach ($bodies as $body) {
                            echo "<option value = " . $body[id_body] . ">$body[body_type]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1">
                    <label for="">Выберите топливо</label>
                    <select name="fuel-1" class="btn btn-light">
                        <?php
                        $fuel = getAllFuel($db);
                        foreach ($fuel as $fl) {
                            echo "<option value = " . $fl[id_fuel] . ">$fl[fuel_name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1">
                    <label for="">Выберите тип КПП</label>
                    <select name="transmission-1" class="btn btn-light">
                        <?php
                        $transmissions = getAllTransmissions($db);
                        foreach ($transmissions as $transmission) {
                            echo "<option value = " . $transmission[id_transmission] . ">$transmission[type_of_transmission]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1">
                    <label for="">Выберите привод</label>
                    <select name="drive-1" class="btn btn-light">
                        <?php
                        $drives = getAllDrives($db);
                        foreach ($drives as $drive) {
                            echo "<option value = " . $drive[id_drive] . ">$drive[type_of_drive]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1">
                    <label for="">Введите цену</label>
                    <input type="text" class="form-control" name="cost-1" placeholder="Введите значение">
                </div>
                <div class="col-1">
                    <label for="">Введите цвет</label>
                    <input type="text" class="form-control" name="color-1" placeholder="Введите значение">
                </div>
                <div class="col-1">
                    <label for="">Укажите дату производства</label>
                    <input type="text" class="form-control" name="date-1" placeholder="YYYY-MM-DD">
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Добавить</button>
    </form>
    <form method="POST" role="form" id="changeRemove" style="display: none" class="form2">
        <div class="form-group form2">
            <div class="row form2" style="justify-content: space-between; align-items: flex-end">
                <div class="col-1 form2">
                    <label class="form2">Выберите марку</label>
                    <select name="brand" id="brand" class="btn btn-light form2">
                        <?php
                        $brands = getAllBrands($db);
                        foreach ($brands as $brand) {
                            echo "<option value = " . $brand[id_brand] . ">$brand[brand_name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1 form2">
                    <label class="form2">Введите модель</label>
                    <input type="text" class="form-control form2" id="model" name="model"
                           placeholder="Введите значение">
                </div>
                <div class="col-1 form2">
                    <label class="form2">Литраж двигателя</label>
                    <select name="engine" id="engine" class="btn btn-light form2">
                        <?php
                        $engines = getAllEngines($db);
                        foreach ($engines as $engine) {
                            echo "<option value = " . $engine[id_engine] . ">$engine[engine_displacement]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1 form2">
                    <label class="form2">Выберите кузов</label>
                    <select name="body" id="body" class="btn btn-light form2">
                        <?php
                        $bodies = getAllBodies($db);
                        foreach ($bodies as $body) {
                            echo "<option value = " . $body[id_body] . ">$body[body_type]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1 form2">
                    <label class="form2">Выберите топливо</label>
                    <select name="fuel" id="fuel" class="btn btn-light form2">
                        <?php
                        $fuel = getAllFuel($db);
                        foreach ($fuel as $fl) {
                            echo "<option value = " . $fl[id_fuel] . ">$fl[fuel_name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1 form2">
                    <label class="form2">Выберите тип КПП</label>
                    <select name="transmission" id="transmission" class="btn btn-light form2">
                        <?php
                        $transmissions = getAllTransmissions($db);
                        foreach ($transmissions as $transmission) {
                            echo "<option value = " . $transmission[id_transmission] . ">$transmission[type_of_transmission]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1 form2">
                    <label class="form2">Выберите привод</label>
                    <select name="drive" id="drive" class="btn btn-light form2">
                        <?php
                        $drives = getAllDrives($db);
                        foreach ($drives as $drive) {
                            echo "<option value = " . $drive[id_drive] . ">$drive[type_of_drive]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-1 form2">
                    <label class="form2">Введите цену</label>
                    <input type="text" class="form-control form2" id="cost" name="cost" placeholder="Введите значение">
                </div>
                <div class="col-1 form2">
                    <label class="form2">Введите цвет</label>
                    <input type="text" class="form-control form2" id="color" name="color"
                           placeholder="Введите значение">
                </div>
                <div class="col-1 form2">
                    <label class="form2">Укажите дату производства</label>
                    <input type="text" class="form-control form2" id="date" name="date" placeholder="YYYY-MM-DD">
                </div>
                <input type="hidden" name="idRow" id="idRow">
            </div>
        </div>

        <button type="submit" name="update_button" class="btn btn-primary form2">Сохранить изменения</button>
        <button type="submit" name="delete_button" class="btn btn-danger form2">Удалить строку</button>
    </form>
    <?php
    if (isset($_POST['model-1']) && $_POST['model-1'] != '' && isset($_POST['cost-1']) && $_POST['cost-1'] != '' && isset($_POST['color-1']) && $_POST['color-1'] != '' && isset($_POST['date-1']) && $_POST['date-1'] != '') {
        $brand = $_POST['brand-1'];
        $model = $_POST['model-1'];
        $engine = $_POST['engine-1'];
        $body = $_POST['body-1'];
        $fuel = $_POST['fuel-1'];
        $transmission = $_POST['transmission-1'];
        $drive = $_POST['drive-1'];
        $cost = $_POST['cost-1'];
        $color = $_POST['color-1'];
        $date = $_POST['date-1'];
        writeToAuto($db, $brand, $model, $engine, $body, $fuel, $transmission, $drive, $cost, $color, $date);
    }
    ?>
    <?php
    if (isset($_POST['model']) && $_POST['model'] != '' && isset($_POST['cost']) && $_POST['cost'] != '' && isset($_POST['color']) && $_POST['color'] != '' && isset($_POST['date']) && $_POST['date'] != '') {
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $engine = $_POST['engine'];
        $body = $_POST['body'];
        $fuel = $_POST['fuel'];
        $transmission = $_POST['transmission'];
        $drive = $_POST['drive'];
        $cost = $_POST['cost'];
        $color = $_POST['color'];
        $date = $_POST['date'];
        $id = $_POST['idRow'];
        if (isset($_POST['update_button'])) {
            changeAuto($db, $brand, $model, $engine, $body, $fuel, $transmission, $drive, $cost, $color, $date, $id);
        } else if (isset($_POST['delete_button'])) {
            deleteAuto($db, $id);
        }

    }
    ?>
</div>
<script src="js/search.js"></script>
<script src="js/script2.js"></script>
</body>
</html>
