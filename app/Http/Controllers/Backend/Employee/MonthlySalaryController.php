<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class MonthlySalaryController extends Controller
{
    public function MonthlySalaryView(){
        return view('backend.employee.monthly_salary.monthly_salary_view');
    }

    public function MonthlySalaryGet(Request $request){
        $date = date('Y-m',strtotime($request->date) ) ;
        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $attendance = EmployeeAttendance::select('employee_id')
        ->groupBy('employee_id')->with(['user'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>No</th>';
        $html['thsource'] .= '<th>Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary This Month</th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($attendance as $key => $attend) {
            $totalAttendance = EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $attend->employee_id)->get();
            $totalAbsen = count($totalAttendance->where('attend_status' , 'Absent'));

            $color = 'success';
            $html[$key]['tdsource']  = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $attend['user']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $attend['user']['salary'] . '</td>';
            

            $salary = (float)$attend['user']['salary'];
            $salaryPerDay = (float)$salary/30;
            $totalSalaryMinus = (float)$totalAbsen*(float)$salaryPerDay;
            $totalSalary = (float)$salary - (float)$totalSalaryMinus;

            $html[$key]['tdsource'] .= '<td>' . $totalSalary . '$' . '</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '" title="PaySlip" target="_blanks" href="' . route("employee.monthly.salary.payslip", $attend->employee_id) . '">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }
        return response()->json(@$html);
    }

    public function MonthlySalaryPayslip(Request $request, $employee_id){
       
        $id = EmployeeAttendance::where('employee_id', $employee_id)->first();
        $date = date('Y-m',strtotime($id->date)) ;
        if ($date!= '') {
            $where[] = ['date', 'like', $date. '%'];
        }

        $data['details'] = EmployeeAttendance::with(['user'])
        ->where($where)->where('employee_id', $id->employee_id)->get();

        //$data['details'] = EmployeeAttendance::with(['user'])->where('employee_id', $id->employee_id)->first();

        $pdf = PDF::loadView('backend.employee.monthly_salary.monthly_salary_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('Monthly_salary.pdf');
    }
}
