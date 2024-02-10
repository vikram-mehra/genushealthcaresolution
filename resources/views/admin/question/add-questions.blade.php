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
                                            <label for="quizQuestion1">Select Quiz Name</label>
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quizType">Select Type</label>
                                            <select id="quizType" class="form-control" name="quizType" required="">
                                                <option value="">--select-- </option>
                                                <option value="1" {{  (isset($question->quizType ) && $question->quizType == '1') ? 'selected' : '' }}>Multiple Radio </option>
                                                <option value="2" {{  (isset($question->quizType ) && $question->quizType == '2') ? 'selected' : '' }}>Multiple Checkbox </option>
                                                <option value="3" {{  (isset($question->quizType ) && $question->quizType == '3') ? 'selected' : '' }}>Boolean </option>
                                                <option value="4" {{  (isset($question->quizType ) && $question->quizType == '4') ? 'selected' : '' }}>Short Ans</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="quizQuestion">Question</label>
                                            <textarea id="quizQuestion" name="question" class="form-control" style="min-height: 350px;" required>{{ (isset($question->question)) ? $question->question : '' }}</textarea>
                                            @if (!empty($errors))
                                            <div style="color:red">{{ $errors->first('question') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="quizQuestion">Remark</label>
                                            <textarea id="remark" name="remark" class="form-control" style="min-height: 35px;" >{{ (isset($question->remark)) ? $question->remark : '' }}</textarea>
                                            
                                        </div>
                                    </div>

                                    <div id="mcq" class="col-md-12" style="display: none;">
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
                                                <label for="answer">Correct Answer</label>
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

                                    <div id="checkbx" class="col-md-12" style="display: none;">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="ans_a">Answer A</label>
                                                <input type="text" id="ans_a1" name="ans_a" class="form-control" style="height: 60px" value="{{ (isset($question->ans_a)) ? $question->ans_a : '' }}" required>
                                                @if (!empty($errors))
                                                <div style="color:red">{{ $errors->first('ans_a') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="ans_b">Answer B</label>
                                                <input type="text" id="ans_b1" name="ans_b" class="form-control" style="height: 60px" value="{{ (isset($question->ans_b)) ? $question->ans_b : '' }}" required>
                                                @if (!empty($errors))
                                                <div style="color:red">{{ $errors->first('ans_b') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="ans_c">Answer C</label>
                                                <input type="text" id="ans_c1" name="ans_c" class="form-control" style="height: 60px" value="{{ (isset($question->ans_c)) ? $question->ans_c : '' }}" required>
                                                @if (!empty($errors))
                                                <div style="color:red">{{ $errors->first('ans_c') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="ans_d">Answer D</label>
                                                <input type="text" id="ans_d1" name="ans_d" class="form-control" style="height: 60px" value="{{ (isset($question->ans_d)) ? $question->ans_d : '' }}" required>
                                                @if (!empty($errors))
                                                <div style="color:red">{{ $errors->first('ans_d') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="answer">Correct Answer</label>
                                                <select id="answer1" name="correct_ans[]" class="form-control" multiple required>
                                                    <option value="ans_a" {{ (isset($question->correct_ans) && in_array("ans_a", explode(",", $question->correct_ans))) ? 'selected' : '' }}>Answer A</option>
                                                    <option value="ans_b" {{ (isset($question->correct_ans) && in_array("ans_b", explode(",", $question->correct_ans))) ? 'selected' : '' }}>Answer B</option>
                                                    <option value="ans_c" {{ (isset($question->correct_ans) && in_array("ans_c", explode(",", $question->correct_ans))) ? 'selected' : '' }}>Answer C</option>
                                                    <option value="ans_d" {{ (isset($question->correct_ans) && in_array("ans_d", explode(",", $question->correct_ans))) ? 'selected' : '' }}>Answer D</option>
                                                </select>

                                                @if (!empty($errors))
                                                <div style="color:red">{{ $errors->first('correct_ans') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div id="booln" class="col-md-12" style="display: none;">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="ans_a">Answer A</label>
                                                <input type="text" id="ans_a2" name="ans_a" class="form-control" style="height: 60px" value="Yes" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="ans_b">Answer B</label>
                                                <input type="text" id="ans_b2" name="ans_b" class="form-control" style="height: 60px" value="No" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="answer">Correct Answer</label>
                                                <select id="answer2" name="correct_ans" class="form-control" required>
                                                    <option value="" selected="true">Select Answer</option>
                                                    <option value="ans_a" {{ (isset($question->correct_ans) && $question->correct_ans == 'ans_a') ? 'selected' : '' }}>Answer A</option>
                                                    <option value="ans_b" {{ (isset($question->correct_ans) && $question->correct_ans == 'ans_b') ? 'selected' : '' }}>Answer B</option>
                                                </select>

                                                @if (!empty($errors))
                                                <div style="color:red">{{ $errors->first('correct_ans') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div id="shortans" class="col-md-12" style="display: none;">
                                    @php $co_ans = (isset($question->correct_ans)) ? explode(",", $question->correct_ans):[];@endphp
                                    @php $label = (isset($question->ans_label)) ? explode("|", $question->ans_label):[];@endphp
                                    <label> Correct Ans </label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="ans_a"><input type="text" id="label_a1" name="label[]" class="form-control" style="height: 40px" value="{{ (isset($label[0])) ? $label[0] : '' }}" 
                                                placeholder="Label A" > </label>
                                               
                                                <input type="text" id="ans_a1" name="correct_ans[]" class="form-control" style="height: 60px" value="{{ (isset($co_ans[0])) ? $co_ans[0] : '' }}" 
                                                placeholder="Answer A" >
                                               
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label for="ans_b"><input type="text" id="label_b1" name="label[]" class="form-control" style="height: 40px" value="{{ (isset($label[1])) ? $label[1] : '' }}" 
                                                placeholder="Label B" > </label>
                                                <input type="text" id="ans_b1" name="correct_ans[]" class="form-control" style="height: 60px" value="{{ (isset($co_ans[1])) ? $co_ans[1] : '' }}" 
                                                placeholder="Answer B">
                                               
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label for="ans_c"><input type="text" id="label_c1" name="label[]" class="form-control" style="height: 40px" value="{{ (isset($label[2])) ? $label[2] : '' }}" 
                                                placeholder="Label C" > </label>
                                                <input type="text" id="ans_c1" name="correct_ans[]" class="form-control" style="height: 60px" value="{{ (isset($co_ans[2])) ? $co_ans[2] : '' }}" 
                                                placeholder="Answer C" >
                                               
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label for="ans_d"><input type="text" id="label_d1" name="label[]" class="form-control" style="height: 40px" value="{{ (isset($label[3])) ? $label[3] : '' }}" 
                                                placeholder="Label D" > </label>
                                                <input type="text" id="ans_d1" name="correct_ans[]" class="form-control" style="height: 60px" value="{{ (isset($co_ans[3])) ? $co_ans[3] : '' }}" 
                                                placeholder="Answer D" >
                                               
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="card-body" id="demo1">
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
    CKEDITOR.replace('quizQuestion');
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function () {
        // Function to toggle visibility based on selected option
        function toggleOptionsVisibility() {
            var selectedOption = $('#quizType').val();

            // Hide all elements and disable required fields
            $('#mcq, #checkbx, #booln, #shortans').hide().find(':input').prop('disabled', true);

            // Enable required fields and show the relevant element based on the selected option
            if (selectedOption === '1') {
                $('#mcq').show().find(':input').prop('disabled', false);
            } else if (selectedOption === '2') {
                $('#checkbx').show().find(':input').prop('disabled', false);
            } else if (selectedOption === '3') {
                $('#booln').show().find(':input').prop('disabled', false);
            } else if (selectedOption === '4') {
                $('#shortans').show().find(':input').prop('disabled', false);
            }
        }

        // Call the function on page load
        toggleOptionsVisibility();

        // Listen for changes on the quizType select element
        $('#quizType').change(function () {
            toggleOptionsVisibility();
        });
    });
</script>
@endsection