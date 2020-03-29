<?php

/*
 * getMitigations: Returns a list of mitigations
 *  PARAM $dbh          the database handle
 *  PARAM $num
 *  RETURN              Set of database records
 */
function getRandMitigation($dbh, $num)
{
    try {
    $sql = "CALL Mitigation_Repository.Mit_Search_RAND;";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $num, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($results);
    }
    catch(PDOException $e) {
        die ('unable to fetch films: ' . $e->getMessage() );
    }
}
function getRecentMitigation($dbh, $num)
{
    try {
        $sql = "CALL Mitigation_Repository.Mit_Search_Resent;";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $num, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    }
    catch(PDOException $e) {
        die ('unable to fetch films: ' . $e->getMessage() );
    }
}
function getTitleSearchMitigation($dbh, $num, $term)
{
    try {
        $sql = "CALL Mitigation_Repository.Mitigation_Search_Title(?);";
        $stmt = $dbh->prepare($sql);
        //$stmt->bindValue(1, $num, PDO::PARAM_INT);
        $stmt->bindValue(1, $term, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    }
    catch(PDOException $e) {
        die ('unable to fetch films: ' . $e->getMessage() );
    }
}

function addAuthor($dbh, $firstName, $lastName)
{
    try {
        $sql = "CALL Mitigation_Repository.Author(?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $firstName, PDO::PARAM_STR);
        $stmt->bindValue(2, $lastName, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    }
    catch(PDOException $e) {
        die ('unable to fetch films: ' . $e->getMessage() );
    }
}

function addSecurityControl($dbh, $category, $type)
{
    try {
        $sql = "CALL Mitigation_Repository.Add_Security_Control(?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $category, PDO::PARAM_STR);
        $stmt->bindValue(2, $type, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    }
    catch(PDOException $e) {
        die ('unable to fetch films: ' . $e->getMessage() );
    }
}

function addSystem($dbh, $os, $version)
{
    try {
        $sql = "CALL Mitigation_Repository.Add_System(?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $os, PDO::PARAM_STR);
        $stmt->bindValue(2, $version, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    }
    catch(PDOException $e) {
        die ('unable to fetch films: ' . $e->getMessage() );
    }
}

function addMitigation($dbh, $title, $description)
{
    try {
        $sql = "CALL Mitigation_Repository.Add_Mitigation(?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $title, PDO::PARAM_STR);
        $stmt->bindValue(2, $description, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    }
    catch(PDOException $e) {
        die ('unable to fetch films: ' . $e->getMessage() );
    }
}
