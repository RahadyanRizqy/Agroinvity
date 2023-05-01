<!DOCTYPE html>
<html>
<head>
    <title>Get value of row selected button using PHP</title>
</head>
<body>
    <?php
        // sample data for demonstration
        $rows = array(
            array('id' => '1', 'name' => 'John', 'age' => '25'),
            array('id' => '2', 'name' => 'Jane', 'age' => '30'),
            array('id' => '3', 'name' => 'Bob', 'age' => '40')
        );
        
        // check if a button has been clicked
        if (isset($_POST['submit'])) {
            // get the ID of the selected row
            $selectedId = $_POST['selectedId'];
            // find the row in the array based on the ID
                    // display the selected row data
                echo "Selected row: ID=" . $row['id'] . ", Name=" . $row['name'] . ", Age=" . $row['age'];
        }
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['age'] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="selectedId" value="<?= $row['id'] ?>">
                        <button type="submit" name="submit">Select</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>