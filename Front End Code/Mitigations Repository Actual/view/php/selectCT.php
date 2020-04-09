<html>
    <head>
    </head>
    <body>

        <!-- Selecting Category Dropdown -->
        <label for="category" style="margin-left: 600px;"> Category: </label>
        <?php
        $mysqli = new MySQLi('localhost', 'admin', 'Sweng#2020', 'Mitigation_Repository');

        $result = $mysqli->query("CALL Mitigation_Repository.GetCategory()");
        ?>
        <select name="category">
            <option selected disabled hidden>Choose Category</option>
            <?php
            while ($rows = $result->fetch_assoc()) {
                $category = $rows['Control Type'];
                echo "<option value = '$category'>$category</option>";
            }
            ?>
        </select>

        <br><br><br>

        <!-- Selecting Type Dropdown -->
        <label for="sec_type" style="margin-left: 600px;"> Type: </label>
        <?php
        $mysqli = new MySQLi('localhost', 'admin', 'Sweng#2020', 'Mitigation_Repository');

        $result = $mysqli->query("CALL Mitigation_Repository.GetType()");
        ?>
        <select name="sec_type">
            <option selected disabled hidden>Choose Type</option>
            <?php
            while ($rows = $result->fetch_assoc()) {
                $sec_type = $rows['Control Function'];
                echo "<option value = '$sec_type'>$sec_type</option>";
            }
            ?>
        </select>

    </body>
</html>
