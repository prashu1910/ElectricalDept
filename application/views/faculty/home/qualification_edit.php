<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Qualification</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Degree</label>
                            <div class="col-sm-4">
                                <select name="degree" class="form-control" id="degree">
                                    <option></option>
                                    <option value="M.E." <?php echo $qual_detail != NULL &&  $qual_detail->degree == "M.E." ? "selected": ""?>>M.E.</option>
                                    <option value="B.E." <?php echo $qual_detail != NULL &&  $qual_detail->degree == "B.E." ? "selected": ""?>>B.E.</option>
                                    <option value="12" <?php echo $qual_detail != NULL &&  $qual_detail->degree == "12" ? "selected": ""?>>12</option>
                                    <option value="10" <?php echo $qual_detail != NULL &&  $qual_detail->degree == "10" ? "selected": ""?>>10</option>
                                </select>
                                <script type="text/javascript">
                                    $(function () {
                                        $("#degree").select2({
                                            tags: true,
                                            placeholder:'-Select-',
                                            createTag: function (params) {
                                              return {
                                                id: params.term,
                                                text: params.term,
                                                newOption: true
                                              }
                                            },
                                            templateResult: function (data) {
                                              var $result = $("<span></span>");

                                              $result.text(data.text);

                                              if (data.newOption) {
                                                $result.append(" <em>(new)</em>");
                                              }

                                              return $result;
                                            }
                                          });
                                    });
                                </script>
                            </div>
                            <label  class="col-sm-2 control-label">Year of Passing</label>
                            <div class="col-sm-3">
                               <div class="">
                                    <div class='input-group date' id='passing_year'>
                                        <input type='text' class="form-control" readonly name="passing_year"  value="<?php echo $qual_detail != NULL ? $qual_detail->year_of_passing: ""?>"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                    $(function () {
                                        $('#passing_year').datetimepicker({
                                            'format':'YYYY',
                                            'useCurrent': false,
                                            'ignoreReadonly':true
                                        });
                                    });
                                </script>
                            
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Institute</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="institute" value="<?php echo $qual_detail != NULL ? $qual_detail->institute: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Board/University</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="board"value="<?php echo $qual_detail != NULL ? $qual_detail->board: ""?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Specialization</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="specialization" value="<?php echo $qual_detail != NULL ? $qual_detail->specialization: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Marks</label>
                            <div class="col-sm-3">
                                <select name="mark_type" class="form-control">
                                    <option value="" >-Select-</option>
                                    <option value="10" <?php echo $qual_detail != NULL && $qual_detail->percentage > 0 ? "selected" : ""?>>Percentage</option>
                                    <option value="20" <?php echo $qual_detail != NULL && $qual_detail->cgpa > 0 ? "selected" : ""?>>CGPA</option>
                                </select>
                                <input type="text" class="form-control" name="marks" value="<?php echo $qual_detail != NULL ? $qual_detail->percentage > 0 ? $qual_detail->percentage : $qual_detail->cgpa : ""?>"/>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <input type="submit"  value="Save" class="btn btn-success"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>