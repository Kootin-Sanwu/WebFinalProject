<?php
function displayProjects()
{
    include "../settings/connection.php";

    $sql = "SELECT projects.project_ID, 
                projects.project_name, 
                CONCAT(employees.first_name, ' ', employees.last_name) AS employee_name, 
                projects.department_ID, 
                projects.employee_ID, 
                projects.begin_date, 
                projects.end_date, 
                projects.workflow,
                projects.status
            FROM projects
            INNER JOIN employees ON projects.employee_ID = employees.employee_ID";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $employee_ID = $row["employee_ID"];
            $project_ID = $row["project_ID"];
            $projectName = $row["project_name"];
            $employeeName = $row["employee_name"];
            $beginDate = $row["begin_date"];
            $endDate = $row["end_date"];
            $workState = $row["workflow"];
            $status = $row["status"];

            echo '<tr>';
            echo "<td>{$projectName}</td>";
            echo "<td>{$employeeName}</td>";
            echo "<td>{$beginDate}</td>";
            echo "<td>{$endDate}</td>";
            echo "<td>{$workState}</td>";

            echo "<td><form class='action-container-two' action='../actions/delete_project_action.php' method='post'>";
            echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
            echo "<button type='submit' value='Delete'>Delete</button>";
            echo "</form>";

            echo "<form class='action-container-two' action='../managements/admin_management.php?msg=edit' method='post'>";
            echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
            echo "<input type='hidden' name='employee_ID' value='{$employee_ID}'>";
            echo "<button type='submit' value='Edit'>Edit</button>";
            echo "</form></td>";
            echo '</tr>';
        }
    }

    // Close the database connection
    $conn->close();
}
