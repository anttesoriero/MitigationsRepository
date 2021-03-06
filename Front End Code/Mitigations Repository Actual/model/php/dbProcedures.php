<?php


//Mit_Search_Recent()
function getRecentMitigation($dbh, $num)
{
    try {
        $sql = "CALL Mitigation_Repository.Mit_Search_Recent;";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $num, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    } catch (PDOException $e) {
        die ('unable to fetch mitigations: ' . $e->getMessage());
    }
}

//Search_Title(IN Title varchar(255))
function getTitleSearchMitigation($dbh, $term)
{
    try {
        $sql = "CALL Mitigation_Repository.Search_By_Title(?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $term, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    } catch (PDOException $e) {
        die ('unable to fetch mitigations: ' . $e->getMessage());
    }
}

//Fuzzy_Search(IN Title varchar(45))
function getFuzzySearchMitigation($dbh, $num, $term)
{
    try {
        $sql = "CALL Mitigation_Repository.Fuzzy_Search(?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $term, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    } catch (PDOException $e) {
        die ('unable to fetch mitigations: ' . $e->getMessage());
    }
}

//Add_Author(IN firstName varchar(45), IN lastName varchar(45))
function addAuthor($dbh, $firstName, $lastName)
{
    try {
        $sql = "CALL Mitigation_Repository.Author(?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $firstName, PDO::PARAM_STR);
        $stmt->bindValue(2, $lastName, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        die ('unable to add author: ' . $e->getMessage());
    }
}

//Add_Security_Control(IN Security_Type varchar(45), IN Security_Function varchar(45))
function addSecurityControl($dbh, $category, $type)
{
    try {
        $sql = "CALL Mitigation_Repository.Add_Security_Control(?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $category, PDO::PARAM_STR);
        $stmt->bindValue(2, $type, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        die ('unable to add security control: ' . $e->getMessage());
    }
}

//Add_System(IN osName varchar(45), IN ver varchar(45))
function addSystem($dbh, $os, $version)
{
    try {
        $sql = "CALL Mitigation_Repository.Add_System(?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $os, PDO::PARAM_STR);
        $stmt->bindValue(2, $version, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        die ('unable to add system: ' . $e->getMessage());
    }
}

//Add_Mitigation(IN RiskTitle varchar(255), IN RiskDescription varchar(255))
function addMitigation($dbh, $title, $description)
{
    try {
        $sql = "CALL Mitigation_Repository.Add_Mitigation(?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $title, PDO::PARAM_STR);
        $stmt->bindValue(2, $description, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        die ('unable to add mitigation: ' . $e->getMessage());
    }
}

//Add_New_Mitigation_Fixed(IN newTitle varchar(255),
//                                                                 IN newDescription varchar(255), IN newOS varchar(45),
//                                                                 IN newVer varchar(45), IN newCat varchar(45),
//                                                                 IN newType varchar(45), IN firstName varchar(255),
//                                                                 IN lastName varchar(255))
function addCompleteMitigation($dbh, $title, $description, $os, $version, $category, $type, $firstName, $lastName)
{
    try {
        $sql = "CALL Mitigation_Repository.Add_New_Mitigation_Fixed(?,?,?,?,?,?,?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $title, PDO::PARAM_STR);
        $stmt->bindValue(2, $description, PDO::PARAM_STR);
        $stmt->bindValue(3, $os, PDO::PARAM_STR);
        $stmt->bindValue(4, $version, PDO::PARAM_STR);
        $stmt->bindValue(5, $category, PDO::PARAM_STR);
        $stmt->bindValue(6, $type, PDO::PARAM_STR);
        $stmt->bindValue(7, $firstName, PDO::PARAM_STR);
        $stmt->bindValue(8, $lastName, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        die ('unable to add mitigation: ' . $e->getMessage());
    }
}

//procedure Forking(IN Mitigation_To_Fork int, IN forkTitle varchar(45),
//                                              IN forkCat varchar(45), IN forkType varchar(45),
//                                               IN forkDescription varchar(255), IN osName varchar(45),
//                                               IN ver varchar(45), IN firstName varchar(45), IN lastName varchar(45))
function fork($dbh, $Mitigation_To_Fork, $title, $category, $type, $description, $os, $version, $firstName, $lastName)
{
    try {
        $sql = "CALL Mitigation_Repository.Forking(?,?,?,?,?,?,?,?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $Mitigation_To_Fork, PDO::PARAM_INT);
        $stmt->bindValue(2, $title, PDO::PARAM_STR);
        $stmt->bindValue(3, $category, PDO::PARAM_STR);
        $stmt->bindValue(4, $type, PDO::PARAM_STR);
        $stmt->bindValue(5, $description, PDO::PARAM_STR);
        $stmt->bindValue(6, $os, PDO::PARAM_STR);
        $stmt->bindValue(7, $version, PDO::PARAM_STR);
        $stmt->bindValue(8, $firstName, PDO::PARAM_STR);
        $stmt->bindValue(9, $lastName, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        die ('unable to fork mitigation: ' . $e->getMessage());
    }
}

//Edit_Risk(IN newTitle varchar(45), IN newDescription varchar(255),
//                                                  IN newOS varchar(45), IN newVer varchar(45), IN newCat varchar(45),
//                                                  IN newType varchar(45), IN mitID int)
function editRisk($dbh, $newTitle, $newDescription, $newOS, $newVer, $newCat, $newType, $riskID)
{
    try {
        $sql = "CALL Mitigation_Repository.Edit_Risk(?,?,?,?,?,?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $newTitle, PDO::PARAM_STR);
        $stmt->bindValue(2, $newDescription, PDO::PARAM_STR);
        $stmt->bindValue(3, $newOS, PDO::PARAM_STR);
        $stmt->bindValue(4, $newVer, PDO::PARAM_STR);
        $stmt->bindValue(5, $newCat, PDO::PARAM_STR);
        $stmt->bindValue(6, $newType, PDO::PARAM_STR);
        $stmt->bindValue(7, $riskID, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        die ('unable to edit mitigation: ' . $e->getMessage());
    }
}

//Display_Children(IN Mit_ID int)
function getChildren($dbh, $mit_id)
{
    try {
        $sql = "CALL Mitigation_Repository.Display_Children(?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $mit_id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    } catch (PDOException $e) {
        die('unable to fetch children : ' . $e->getMessage());
    }
}

//Search_By_ID(IN MitID varchar(45))
function searchByID($dbh, $mit_id)
{
    try {
        $sql = "CALL Mitigation_Repository.Search_By_ID(?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $mit_id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    } catch (PDOException $e)
    {
        die('unable to fetch mitigation by ID : ' . $e->getMessage());
    }
}

//procedure Delete_Mit(IN mit_ID int)
function deleteMit($dbh, $mit_id)
{
    try {
        $sql = "CALL Mitigation_Repository.Delete_Mit(?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $mit_id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        die ('unable to fork mitigation: ' . $e->getMessage());
    }
}

//Mitigation_Search(IN Category varchar(45), IN Sec_Type varchar(45))
function catTypeSearch($dbh, $category, $type)
{
    try {
        $sql = "CALL Mitigation_Repository.Mitigation_Detailed_Search(?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $category, PDO::PARAM_STR);
        $stmt->bindValue(2, $type, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    } catch (PDOException $e) {
        die('unable to fetch mitigation by ID : ' . $e->getMessage());
    }
}

//get_Role(IN username varchar(45))
function getRole($dbh, $username)
{
    try {
        $sql = "CALL Mitigation_Repository.get_Role(?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    } catch (PDOException $e) {
        die('unable to fetch mitigation by ID : ' . $e->getMessage());
    }
}

function createUser($dbh, $username, $password, $role)
{
    try {
        $sql = "CALL Mitigation_Repository.Add_User(?,?,?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $username, PDO::PARAM_STR);
        $stmt->bindValue(2, $password, PDO::PARAM_STR);
        $stmt->bindValue(3, $role, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        die ('unable to add mitigation: ' . $e->getMessage());
    }
}

function getAuthor($dbh, $mitid)
{
    try {
        $sql = "CALL Mitigation_Repository.get_Author(?);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $mitid, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($results);
    } catch (PDOException $e) {
        die('unable to fetch mitigation by ID : ' . $e->getMessage());
    }
}