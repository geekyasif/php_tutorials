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

if(isset($_POST["page_no"])){
    $page_no = $_POST["page_no"];
}else{
    $page_no = 1;
}

$offset = ($page_no -  1) * $limit;

$sql = "SELECT * FROM `tourist` LIMIT {$offset}, {$limit}";

$result = mysqli_query($conn,$sql);
$data = "";
if(mysqli_num_rows($result)){
    $data .= '<table class="table mt-4">
             <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Destination</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>';
    while($row = mysqli_fetch_assoc($result)){
        $data .= '<tbody>
                    <tr>
                        <th>'.$row['sno'] .'</th>
                        <td>'. $row["name"] .'</td>
                        <td>'. $row["dest"] .'</td>
                        <td> <button class="btn btn-warning btn-md editbtn" data-toggle="modal" data-target="#exampleModal"  data-id='. $row["sno"] .'>edit</button></td>
                        <td> <button class="btn btn-danger btn-md deleteBtn"  data-id='. $row["sno"] .'>delete</button></td>
                    </tr>
                </tbody>';
    }
    $data .= '</table>';
    $data .=    '<nav aria-label="...">
           <ul class="pagination justify-content-center my-4" id="pagination">';

           $sql1 = "SELECT * FROM `tourist`";
           $result1 = mysqli_query($conn,$sql1);
           $total_records = mysqli_num_rows($result1);
           $limit = 3;
           $total_pages = ceil($total_records/$limit);
           
           for($i =1; $i <= $total_pages ; $i++){
              if($page_no == $i){
                  $active = "active";
              }else{
                $active = "";
              }
             $data.= ' <li class="page-item '.$active.'"><a class="page-link " id="'.$i.'" href="">'.$i.'</a></li>';
           }
           


           $data .='</ul>
           </nav>';
    echo $data;

}
?>




