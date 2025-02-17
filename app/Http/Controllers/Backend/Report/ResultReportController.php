<?php
namespace App\Http\Controllers\Backend\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\ExamType;
use App\Models\StudentMarks;
use PDF;
class ResultReportController extends Controller
{
    public function ResultView(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['exam_type'] = ExamType::all();
    	return view('backend.report.student_result.student_result_view',$data);
    }
    public function ResultGet(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$exam_type_id = $request->exam_type_id;
    	$singleResult = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();
    if ($singleResult) {
    	$data['allData'] = StudentMarks::with(['student.father', 'year', 'student_class', 'exam_type', 'subject', 'grade'])
            ->where('year_id',$year_id)
            ->where('class_id',$class_id)
            ->where('exam_type_id',$exam_type_id)
            ->get();
    $pdf = PDF::loadView('backend.report.student_result.student_result_pdf', $data);
	return $pdf->stream('document.pdf');
    }else{
    	$notification = array(
    		'message' => 'Sorry These Criteria Does not match',
    		'alert-type' => 'error'
    	);
    	return redirect()->back()->with($notification);
    }
    } // end Method 
}