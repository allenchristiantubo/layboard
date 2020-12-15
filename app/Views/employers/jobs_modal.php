<div class="modal fade" id="employersAddJob" tabindex="-1" role="dialog" aria-labelledby="addSkills" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title w-100" id="addJob">Post a Job</h5>
      </div>
      <div class="modal-body">
        <div id="jobFirstContainer">
            <h6>Title of Job Post</h6>
            <div class="form-group">
                <input type="text" name="" id="txtJobTitle" class="form-control" placeholder="Title">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selectJobCategory">Category</label>
                        <select id="selectJobCategory" class="form-control">
                            <option value="" selected disabled>Choose...</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selectJobSpecialty">Specialty</label>
                        <select id="selectJobSpecialty" class="form-control">
                            <option value="" selected disabled>Choose...</option>
                        </select>
                    </div>
                </div>
            </div>
            
        </div>
        
        <hr>
        <h6>Selected Skills</h6>
        <div class="container-fluid border mb-2" id="addSelectedSkills" style="height:150px;">
            
        </div>
        <div class="container-fluid" id="addResultSkills" style="height:150px;">
          <h6 class='mb-2'>No results yet.</h6>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sub" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-main" id="btnSaveSkills">Save</button>
      </div>
    </div>
  </div>
</div>