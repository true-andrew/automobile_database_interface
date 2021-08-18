<?php

function getAllBrands($db)
{
    $sql = "SELECT * FROM brand";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[$row['id_brand']] = $row;
    }
    return $result;
}

function getAllEngines($db)
{
    $sql = "SELECT * FROM engine";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[$row['id_engine']] = $row;
    }
    return $result;
}

function getAllFuel($db)
{
    $sql = "SELECT * FROM type_of_fuel";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[$row['id_fuel']] = $row;
    }
    return $result;
}

function getAllTransmissions($db)
{
    $sql = "SELECT * FROM transmission";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[$row['id_transmission']] = $row;
    }
    return $result;
}


function getAllDrives($db)
{
    $sql = "SELECT * FROM drive";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[$row['id_drive']] = $row;
    }
    return $result;
}


function getAllBodies($db)
{
    $sql = "SELECT * FROM body";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[$row['id_body']] = $row;
    }
    return $result;
}

function getAllAuto($db)
{
    $sql = "SELECT automobiles.id_auto, brand.brand_name, automobiles.model, engine.engine_displacement,
            body.body_type, type_of_fuel.fuel_name, transmission.type_of_transmission,
            drive.type_of_drive, automobiles.cost, automobiles.color,
            automobiles.date_of_manufacture FROM automobiles
            INNER JOIN brand ON automobiles.brand = brand.id_brand
            INNER JOIN engine ON automobiles.engine = engine.id_engine
            INNER JOIN body ON automobiles.body = body.id_body
            INNER JOIN type_of_fuel ON automobiles.fuel = type_of_fuel.id_fuel
            INNER JOIN transmission ON automobiles.transmission = transmission.id_transmission
            INNER JOIN drive ON automobiles.drive = drive.id_drive;";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[$row['id_auto']] = $row;
    }
    return $result;
}


function writeToСharacteristics($db, $dbName, $name)
{
    switch ($dbName) {
        case 'type_of_fuel':
            $sql = "INSERT INTO type_of_fuel(fuel_name)
                    VALUES(:name)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);

            $stmt->execute();
            break;
        case 'transmission':
            $sql = "INSERT INTO transmission(type_of_transmission)
                    VALUES(:name)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);

            $stmt->execute();
            break;
        case 'drive':
            $sql = "INSERT INTO drive(type_of_drive)
                    VALUES(:name)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);

            $stmt->execute();
            break;
        case 'brand':
            $sql = "INSERT INTO brand(brand_name)
                    VALUES(:name)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);

            $stmt->execute();
            break;
        case 'engine':
            $sql = "INSERT INTO engine(engine_displacement)
                    VALUES(:name)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name);

            $stmt->execute();
            break;
        case 'body':
            $sql = "INSERT INTO body(body_type)
                    VALUES(:name)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);

            $stmt->execute();
            break;
    }
}

function changeCharacteristics($db, $dbName, $name, $id)
{
    switch ($dbName) {
        case 'type_of_fuel':
            $sql = "UPDATE type_of_fuel
                    SET fuel_name = :name
                    WHERE id_fuel = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 'transmission':
            $sql = "UPDATE transmission
                    SET type_of_transmission = :name
                    WHERE id_transmission = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 'drive':
            $sql = "UPDATE drive
                    SET type_of_drive = :name
                    WHERE id_drive = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 'brand':
            $sql = "UPDATE brand
                    SET brand_name = :name
                    WHERE id_brand = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 'engine':
            $sql = "UPDATE engine
                    SET engine_displacement = :name
                    WHERE id_engine = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 'body':
            $sql = "UPDATE body
                    SET body_type = :name
                    WHERE id_body = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
    }
}

function deleteFromCharacteristics($db, $dbName, $id)
{
    switch ($dbName) {
        case 'type_of_fuel':
            $sql = "DELETE FROM type_of_fuel
                    WHERE id_fuel = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 'transmission':
            $sql = "DELETE FROM transmission
                    WHERE id_transmission = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 'drive':
            $sql = "DELETE FROM drive
                    WHERE id_drive = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 'brand':
            $sql = "DELETE FROM brand
                    WHERE id_brand = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 'engine':
            $sql = "DELETE FROM engine
                    WHERE id_engine = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 'body':
            $sql = "DELETE FROM body
                    WHERE id_body = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            break;
    }
}

function writeToAuto($db, $brand, $model, $engine, $body, $fuel, $transmission, $drive, $cost, $color, $date) {
    $sql = "INSERT INTO automobiles(brand, model, engine, body, fuel, transmission, drive, cost, color, date_of_manufacture)
            VALUES(:brand, :model, :engine, :body, :fuel, :transmission, :drive, :cost, :color, :date)
            ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':brand', $brand, PDO::PARAM_STR);
    $stmt->bindValue(':model', $model, PDO::PARAM_STR);
    $stmt->bindValue(':engine', $engine);
    $stmt->bindValue(':body', $body, PDO::PARAM_STR);
    $stmt->bindValue(':fuel', $fuel, PDO::PARAM_STR);
    $stmt->bindValue(':transmission', $transmission, PDO::PARAM_STR);
    $stmt->bindValue(':drive', $drive, PDO::PARAM_STR);
    $stmt->bindValue(':cost', $cost, PDO::PARAM_INT);
    $stmt->bindValue(':color', $color, PDO::PARAM_STR);
    $stmt->bindValue(':date', $date);
    $stmt->execute();
}

function changeAuto($db, $brand, $model, $engine, $body, $fuel, $transmission, $drive, $cost, $color, $date, $id){
    $sql = "UPDATE automobiles SET
            brand = :brand, model = :model, engine = :engine, body = :body, fuel = :fuel, 
            transmission = :transmission, drive = :drive, cost = :cost, color = :color, date_of_manufacture = :date
            WHERE id_auto = :id
            ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':brand', $brand, PDO::PARAM_STR);
    $stmt->bindValue(':model', $model, PDO::PARAM_STR);
    $stmt->bindValue(':engine', $engine);
    $stmt->bindValue(':body', $body, PDO::PARAM_STR);
    $stmt->bindValue(':fuel', $fuel, PDO::PARAM_STR);
    $stmt->bindValue(':transmission', $transmission, PDO::PARAM_STR);
    $stmt->bindValue(':drive', $drive, PDO::PARAM_STR);
    $stmt->bindValue(':cost', $cost, PDO::PARAM_INT);
    $stmt->bindValue(':color', $color, PDO::PARAM_STR);
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function deleteAuto($db, $id) {
    $sql = "DELETE FROM automobiles
            WHERE id_auto = :id";
    $stmt = $db -> prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

?>
