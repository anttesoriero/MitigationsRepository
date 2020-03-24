<?php

/********************************************************
 * Database functions
 * $dbh is the database handle
 ********************************************************/

/*
 * getMitigations: Returns a list of mitigations
 *  PARAM $dbh          the database handle
 *  PARAM $num
 *  RETURN              Set of database records
 */

function getMitigations($dbh, $num)
{
    try {
    $sql = "CALL Mitigation_Repository.Mitigation_Search('Physical', 'Preventative');";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $num, PDO::PARAM_INIT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($results);
    return Json("OK");

    } catch (PDOException $e)
    {
        die ('unable to search mitigations : ' . $e->getMessage() );
    }
}

