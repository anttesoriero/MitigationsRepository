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

function getMitigations($dbh)
{
    try {
    $sql = "CALL Mitigation_Repository"
    } catch (PDOException &e)
}