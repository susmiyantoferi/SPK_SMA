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
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<table id="customers" >
    <tr>
      <td>
        <h2>

          <?php $image_path = '/upload/sekolahan.png'; ?>
          <img src="{{ public_path().$image_path }}" width="200" height="100">

        </h2>
      </td>

      <td><h2>Easy Bootcamp Learning</h2>
        <p>School Address : INDONESIA</p>
        <p>School Phone : 9493666</p>
        <p>School Email : easyschool@gmail.com</p>
        <p><b>Employee Monthly Salary </b></p>
     </td>
    </tr>
</table>


@php 
 
 $date = date('Y-m',strtotime($details['0']->date));
       if ($date !='') {
        $where[] = ['date','like',$date.'%'];
       }
$totalattend = App\Models\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$details['0']->employee_id)->get();
        $salary = (float)$details['0']['user']['salary'];
        $salaryperday = (float)$salary/30;
        $totalAbsen = count($totalattend->where('attend_status','Absent'));
        $totalsalaryminus = (float)$totalAbsen*(float)$salaryperday;
        $totalSalary = (float)$salary-(float)$totalsalaryminus;
 
@endphp

<table id="customers">
  <tr>
    <th width="10%">No</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Name</b></td>
    <td>{{ $details['0']['user']['name'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Id No </b></td>
    <td>{{ $details['0']['user']['id_no']}}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Basic Salary</b></td>
    <td>{{ $details['0']['user']['salary'] }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Total Absent This Month</b></td>
    <td>{{ $totalAbsen }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Month</b></td>
    <td>{{ date('M Y', strtotime($details['0']->date)) }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Salary This Month</b></td>
    <td>{{ $totalSalary }}</td>
  </tr>
  
</table>
<br>
<i style="font-size: 10px; float: right;"> Print Date :  {{ date("d M Y") }}</i>
<hr style="border: dashed 2px; width: 95%; color:black; margin-bottom: 50px;">

</body>
</html>


