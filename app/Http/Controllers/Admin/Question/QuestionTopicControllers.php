<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseTopic;
use App\Models\Question;
use Validator;

class QuestionTopicControllers extends Controller
{
    public function Index()
    {
        $courses = Course::whereStatus(1)->get();
        $questions = Question::with('course', 'course_topic')->paginate(50);
        $coursetopics = CourseTopic::where('status',1)->get();

        return view('admin/question/exam', compact('courses', 'questions','coursetopics'));
    }

    public function addQuestion()
    {
        $coursetopics = CourseTopic::where('status',1)->get();
        return view('admin/question/add-questions', compact('coursetopics'));
    }

    public function saveQuestion(Request $req)
    {
        //dd($req->all());
        $req->validate([
            'course_topic_id' => 'required',
            'question' => 'required',
            'quizType' => 'required',
            'correct_ans' => 'required',
        ]);
         // If quizType is 2, convert correct_ans from array to string
        if ($req->input('quizType') == 2 && is_array($req->input('correct_ans'))) {
            $req->merge(['correct_ans' => implode(',', $req->input('correct_ans'))]);
        }

         // If quizType is 4, convert correct_ans from array to string
         if ($req->input('quizType') == 4 && is_array($req->input('correct_ans'))) {
            $req->merge(['correct_ans' => implode(',', $req->input('correct_ans'))]);
        }
        $inputArr = $req->except('_token');
        //print_r($inputArr);die;
        Question::create($inputArr);

        return redirect(url("admin/exam"))->with(['message' => 'Question Added !', 'alert-type' => 'success']);
    }

    public function editQuestion(Request $req, $id)
    {
        if($req->isMethod('post')) {
            $req->validate([
                //'course_id' => 'required',
                'course_topic_id' => 'required',
                'question' => 'required',
                'ans_a' => 'required',
                'ans_b' => 'required',
                'ans_c' => 'required',
                'ans_d' => 'required',
                'correct_ans' => 'required',
            ]);

            // If quizType is 2, convert correct_ans from array to string
            if ($req->input('quizType') == 2 && is_array($req->input('correct_ans'))) {
                $req->merge(['correct_ans' => implode(',', $req->input('correct_ans'))]);
            }
             // If quizType is 4, convert correct_ans from array to string
            if ($req->input('quizType') == 4 && is_array($req->input('correct_ans'))) {
                $req->merge(['correct_ans' => implode(',', $req->input('correct_ans'))]);
            }
            $UpdateArr = $req->except('_token');
            // dd($UpdateArr);
            Question::find($id)->update($UpdateArr);

            return redirect(url("admin/exam"))->with(['message' => 'Question Updated !', 'alert-type' => 'success']);
        } else {
            $question = Question::find($id);
            $coursetopics = CourseTopic::where('status',1)->get();
            return view('admin/question/add-questions', compact('question', 'id','coursetopics'));
        }
    }

    public function delete($id)
    {
        Question::find($id)->delete();
        
        return back()->with(['message' => 'Question Deleted !', 'alert-type' => 'error']);
    }
    
    public function allQuestionView(){
        $question = Question::all();
        return view('admin/question/question_all_list', compact('question'));
    }
}
