<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

@if(isset($allData) && count($allData) > 0)
<table id="customers">
  <tr>
    <td><h2>
  <?php $image_path = '/upload/easyschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100">

    </h2></td>
    <td><h2>Easy School ERP</h2>
<p>School Address</p>
<p>Phone : 343434343434</p>
<p>Email : support@easylerningbd.com</p>
<p> <b>Student Result Report </b> </p>

    </td> 
  </tr>
  
   
</table>
 <br> <br>
 <strong>Result of : </strong> {{ $allData[0]['exam_type']['name'] ?? 'N/A' }} 
 <br> <br>
<table id="customers">
   
  <tr>    
    <td width="25%"> <h4>Year / Session : </h4> {{ $allData[0]['year']['name'] ?? 'N/A' }} </td>
    <td width="25%"> <h4>Class : </h4>{{ $allData[0]['student_class']['name'] ?? 'N/A' }} </td>
    <td width="25%"> <h4>Subject : </h4>{{ $allData[0]['subject']['name'] ?? 'N/Aaaa' }} </td>
    <td width="25%"> <h4>Exam Type : </h4>{{ $allData[0]['exam_type']['name'] ?? 'N/A' }} </td>
  </tr>

  
   
   
</table>
<br> <br>

<table id="customers">
  <tr>
    <th>SL</th>
    <th>Student Name</th>
    <th>ID No</th>
    <th>Father Name</th>
    <th>Gender</th>
    <th>Letter Grade</th>
    <th>Marks</th>
    <th>Grade Point</th>
  </tr>
  @foreach($allData as $key => $data)
  <tr>
    <td>{{ $key+1 }}</td>
    <td>{{ $data['student']['name'] ?? 'N/A' }}</td>
    <td>{{ $data['student']['id_no'] ?? 'N/A' }}</td>
    <td>{{ $data['student']['father']['name'] ?? 'N/A' }}</td> <!-- Update this line -->
    <td>{{ $data['student']['gender'] ?? 'N/A' }}</td>
    <td>{{ $data['grade']['letter_grade'] ?? 'N/A' }}</td>
    <td>{{ $data['marks'] ?? 'N/A' }}</td>
    <td>{{ isset($data['grade']['grade_point']) ? number_format((float)$data['grade']['grade_point'],2) : 'N/A' }}</td>
  </tr>
  @endforeach
</table>

<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">
@else
<p>No data available</p>
@endif
 
 

</body>
</html>