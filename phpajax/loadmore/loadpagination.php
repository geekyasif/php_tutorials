<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "learnphp";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
   die("cant connect");
}
$limit = 3;
if(isset($_POST['page_no'])){

    $page_no = $_POST['page_no'];
}else{
    $page_no = 0;
}

$sql = "SELECT * FROM `tourist` LIMIT {$page_no}, {$limit}";
$result = mysqli_query($conn,$sql);
$data = "";
if($num = mysqli_num_rows($result)){
    $data .= '<tbody>';
    $sno = $page_no + 1;
   while($row = mysqli_fetch_assoc($result)){
       $last_id = $row['sno'];
       $data .= ' <tr>
                        <th>'.$sno .'</th>
                        <td>'. $row["name"] .'</td>
                        <td>'. $row["dest"] .'</td>
                        <td> <button class="btn btn-warning btn-md editbtn" data-toggle="modal" data-target="#exampleModal"  data-id='. $row["sno"] .'>edit</button></td>
                        <td> <button class="btn btn-danger btn-md deleteBtn"  data-id='. $row["sno"] .'>delete</button></td>
                    </tr>  ';
                $sno++;
            }
            $data .= '</tbody>';
            $data .='<tbody id="pagination">
                        <tr>
                            <td colspan="4">
                                <button type="button" class="btn btn-primary loadBtn mb-4" id="loadBtn" data-id=" '.$last_id.'">Load More</button>
                            </td>
                        </tr>  
                    </tbody>  ';
   echo $data;
}else{
    echo "no data found";
}

?>