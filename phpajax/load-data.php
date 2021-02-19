<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "learnphp";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
   die("cant connect");
}

$sql = "SELECT * FROM `tourist`";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
$data ="";
if($num > 0){
    $data = '<thead>
                    <tr>
                        <th scope="col">S.no</th>
                        <th scope="col">Name</th>
                        <th scope="col">Destination</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>';
             
             $sno = 0;
    while($row = mysqli_fetch_assoc($result) ){
        $sno = $sno+1;
      $data .= '<tbody>
                    <tr>
                        <th>'. $sno .'</th>
                        <td>'. $row["name"] .'</td>
                        <td>'. $row["dest"] .'</td>
                        <td> <button class="btn btn-warning btn-md editbtn" data-toggle="modal" data-target="#exampleModal"  data-id='. $row["sno"] .'>edit</button></td>
                        <td> <button class="btn btn-danger btn-md deleteBtn"  data-id='. $row["sno"] .'>delete</button></td>
                    </tr>
                </tbody>';

}
echo $data;
}else{
    echo "<h4 class='text-center mt-3'>No Data found !</h5> ";
}

