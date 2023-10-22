<?php
    define('DSN', 'mysql:host=localhost;port=3308;dbname=restoran');
    define('DBUSER', 'root');
    define('DBPASS', '');

    $db = new PDO(DSN, DBUSER, DBPASS);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["description"])) {
        $description = $_POST["description"];
        $due_date = $_POST["due_date"];

        $sql = "INSERT INTO  menu (, , ) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$user_id, $description, $due_date]);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_task_id"])) {
        $edit_task_id = $_POST["edit_task_id"];
        $edited_description = $_POST["edited_description"];
        $edited_due_date = $_POST["edited_due_date"];

        $sql = "UPDATE tasks SET description = ?, due_date = ? WHERE id = ? AND user_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$edited_description, $edited_due_date, $edit_task_id, $user_id]);
    }
    $sql = "SELECT * FROM tasks WHERE user_id = ? ORDER BY is_done ASC, due_date";
    $stmt = $db->prepare($sql);
    $stmt->execute([$user_id]);
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
?>