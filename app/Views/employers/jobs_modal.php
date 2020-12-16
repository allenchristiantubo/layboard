<!-- 1st MODAL -->
<div class="modal fade" id="employersAddJobTitle" tabindex="-1" role="dialog" aria-labelledby="addTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 text-arial-rounded" id="addTitle">Title and Category</h5>
        <!-- <h5 class="modal-title w-100" id="addTitle">Post a Job</h5> -->
      </div>
      <div class="modal-body">
        <div id="jobFirstContainer">
            
            <div class="form-group">
                <label class="text-arial-rounded" for="txtJobTitle">Title</label>
                <input type="text" id="txtJobTitle" class="form-control" placeholder="Name of job post">
                <div class="invalid-feedback" id="txtJobTitleValidation"></div>
            </div>
            <div id="jobTitleExample">
              <h6>Title examples:</h6>
              <ul>
                <li>Web Developer for basic CRUD</li>
                <li>Need a new logo design for a company</li>
                <li>Java Developer for School Project</li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="text-arial-rounded" for="selectJobCategory">Category</label>
                      <select id="selectJobCategory" class="form-control">
                          <option value="" selected disabled>Choose...</option>
                          <?php
                          if(!empty($categories))
                          {
                            foreach($categories as $category)
                            {
                              echo "<option value='". $category['category_id'] ."'>". $category['category_name'] ."</option>";
                            }
                          }
                          ?>
                      </select>
                      <div class="invalid-feedback" id="txtJobCategoryValidation"></div>
                  </div>
                  <div id="jobCategoryDescription" class="my-3">
                    
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="text-arial-rounded" for="selectJobSpecialty">Specialty</label>
                      <select id="selectJobSpecialty" class="form-control">
                          <option value="" selected disabled>Choose...</option>
                      </select>
                      <div class="invalid-feedback" id="txtJobSpecialtyValidation"></div>
                  </div>
                  <div id="jobSpecialtyDescription" class="my-3">
                  
                  </div>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sub" id="btnCancel"><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="btn btn-main" id="btnFirstNext"><i class="fas fa-angle-double-right"></i> Next</button>
      </div>
    </div>
  </div>
</div>

<!-- 2nd MODAL -->
<div class="modal fade" id="employersAddJobDescription" tabindex="-1" role="dialog" aria-labelledby="addDescription" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 text-arial-rounded" id="addJob">Description</h5>
      </div>
      <div class="modal-body">
        <div id="jobSecondContainer">
            <h6>Description</h6>
            <div class="form-group">
                <textarea type="text" name="" id="txtJobDescription" class="form-control" placeholder="Description of job post" rows="3"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sub" id="btnSecondBack"><i class="fas fa-angle-double-left"></i> Back</button>
        <button type="button" class="btn btn-main" id="btnSecondNext"><i class="fas fa-angle-double-right"></i> Next</button>
      </div>
    </div>
  </div>
</div>