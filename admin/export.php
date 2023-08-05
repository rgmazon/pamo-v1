<?php
include('../inc/config.php');

//export table data to excel

if (isset($_GET['export'])) {

    $output = "";

    $output .= '<table class="table table-bordered" border="1">  
                    <tr>  
                          <th scope="col">ID</th>
                          <th scope="col">Full Name</th>
                          <th scope="col">Address</th>
                          <th scope="col">Birthdate</th>
                    </tr>';

    $sql = "SELECT * from users ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $key => $value) {

        $output .= '<tr>  
                         <td>' . $value['id'] . '</td>   
                         <td>' . $value['fname'] . $value['lname'] . '</td> 
                         <td>' . 'Sitio' . $value['sitio'] . 'Barangay' . $value['barangay'] . $value['municipality'] . '</td>  
                         <td>' . $value['dob'] . '</td>   
                          
                    </tr>';
    }

    $output .= '</table>';

    $filename = "table_data_export_" . date('Ymd') . ".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    echo $output;
}
