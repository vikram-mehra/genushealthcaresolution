@extends('admin/layout/master')
@section('main-contant')
    <main>
    <div class="container-fluid">
        <h2 class="mt-5 mb-4">Question</h2>
        <div class="row">
            <div class="col-md-12">
                @if(isset($id))
                <form action="{{ url('/admin/update-question') }}/{{$id}}" method="post">
                @else 
                <form action="{{ url('/admin/add-question') }}" method="post">
                @endif
                    
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h6 class="card-title">Question Form</h6>
                        </div>
                        <div class="card-body" id="demo">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quizQuestion">Select Quiz Name</label>
                                        <select id="quizName" class="form-control" name="course_topic_id" required="">
                                            <option value="">-- Select --</option>
                                            @if(! empty($coursetopics))
                                                @foreach($coursetopics as $val)
                                                    <option value="{{ $val->id }}" @if(isset($id)) {{$val->id==$question->course_topic_id ? 'selected' : ''}} @endif>{{$val->subject_title }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="quizQuestion">Question</label>
                                        <textarea id="quizQuestion" name="question" class="form-control" style="min-height: 350px;" required>{{ (isset($question->question)) ? $question->question : '' }}</textarea>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('question') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ans_a">Answer A</label>
                                        <input type="text" id="ans_a" name="ans_a" class="form-control" style="height: 60px" value="{{ (isset($question->ans_a)) ? $question->ans_a : '' }}" required>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('ans_a') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ans_b">Answer B</label>
                                        <input type="text" id="ans_b" name="ans_b" class="form-control" style="height: 60px" value="{{ (isset($question->ans_b)) ? $question->ans_b : '' }}" required>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('ans_b') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ans_c">Answer C</label>
                                        <input type="text" id="ans_c" name="ans_c" class="form-control" style="height: 60px" value="{{ (isset($question->ans_c)) ? $question->ans_c : '' }}" required>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('ans_c') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ans_d">Answer D</label>
                                        <input type="text" id="ans_d" name="ans_d" class="form-control" style="height: 60px" value="{{ (isset($question->ans_d)) ? $question->ans_d : '' }}" required>
                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('ans_d') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="answer">Write Answer</label>
                                        <select id="answer" name="correct_ans" class="form-control" required>
                                            <option value="" selected="true">Select Answer</option>
                                            <option value="ans_a" {{ (isset($question->correct_ans) && $question->correct_ans == 'ans_a') ? 'selected' : '' }}>Answer A</option>
                                            <option value="ans_b" {{ (isset($question->correct_ans) && $question->correct_ans == 'ans_b') ? 'selected' : '' }}>Answer B</option>
                                            <option value="ans_c" {{ (isset($question->correct_ans) && $question->correct_ans == 'ans_c') ? 'selected' : '' }}>Answer C</option>
                                            <option value="ans_d" {{ (isset($question->correct_ans) && $question->correct_ans == 'ans_d') ? 'selected' : '' }}>Answer D</option>
                                        </select>

                                        @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('correct_ans') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body --> 
                    </div>
                    <!-- /.card -->
                    <div class="card-body" id="demo">
                        <div class="col-sm-12">
                            <div class="form-group">
                                @if(isset($id))
                                <input type="submit" value="Update" class="btn btn-success float-right">
                                @else 
                                <input type="submit" value="Submit" class="btn btn-success float-right">
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </form>
                    <!-- card --> 
                    <!-- end --> 
            </div>
        </div>
    </div>
</main>
@endsection

@section('javascript')
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'quizQuestion' );
    
</script>

@endsection