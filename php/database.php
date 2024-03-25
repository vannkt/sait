<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $names = $_POST['names'];
    $date = strtotime($_POST['date']); // Convert date to Unix timestamp
    $phone = $_POST['phone']; // No need to convert phone to integer
    $car = $_POST['car'];

    // Check if any field is empty
    if (!empty($names) && !empty($date) && !empty($phone) && !empty($car)) {
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "service 5 stars"; // Remove space from database name

        // Create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die('Connect Error (' . $conn->connect_errno . ')' . $conn->connect_error);
        } else {
            // Check if the date and hour are already reserved
            $stmt = $conn->prepare("SELECT * FROM reservation WHERE date = ?");
            $stmt->bind_param("s", date('Y-m-d H:i:s', $date)); // Use 's' for string in bind_param
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "Датата или Часа са заети. Моля изберете друга дата/час";
            } else {
                // No conflicting reservation, proceed with inserting new reservation
                $stmt = $conn->prepare("INSERT INTO reservation (names, date, phone, car) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $names, date('Y-m-d H:i:s', $date), $phone, $car); // Use 's' for string in bind_param

                if ($stmt->execute()) {
                    echo "Резервацията направена";
                } else {
                    echo "Грешка при резервацията: " . $conn->error;
                }
            }
            $stmt->close();
            $conn->close();
        }
    } else {
        echo "Всички полета за задължителни";
    }
}
?>
