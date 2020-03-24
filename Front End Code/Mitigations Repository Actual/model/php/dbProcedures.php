<?php

/*
 * getMitigations: Returns a list of mitigations
 *  PARAM $dbh          the database handle
 *  PARAM $num
 *  RETURN              Set of database records
 */

function getMitigation($dbh, $num)
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

