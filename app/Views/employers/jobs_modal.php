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
              <input type="text" id="txtJobID" class="form-control d-none" placeholder="Job ID">
            </div>
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
        <h5 class="modal-title w-100 text-arial-rounded" id="addDescription">Description</h5>
      </div>
      <div class="modal-body">
        <div id="jobSecondContainer">
            <small>(50 - 10000 characters)</small>
            <div class="form-group">
                <textarea type="text" id="txtJobDescription" class="form-control" placeholder="Description of job post" rows="10"></textarea>
                <div class="invalid-feedback" id="txtJobDescriptionValidation"></div>
            </div>
            <small id="txtDescriptionLimit">You can still use 10,000 characters</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sub" id="btnSecondBack"><i class="fas fa-angle-double-left"></i> Back</button>
        <button type="button" class="btn btn-main" id="btnSecondNext"><i class="fas fa-angle-double-right"></i> Next</button>
      </div>
    </div>
  </div>
</div>
<!-- 3rd Modal -->
<div class="modal fade" id="employersAddJobExpertise" tabindex="-1" role="dialog" aria-labelledby="addExpertise" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 text-arial-rounded" id="addExpertise">Expertise</h5>
      </div>
      <div class="modal-body">
        <div id="jobExpertiseContainer">
          <h6>Expertise are based from the category and specialty you set to this job.</h6>
          <div class="form-group">
            <input type="text" class="form-control" id="txtAddSkills" placeholder="What skills do you need?">
            <div class="invalid-feedback" id="txtJobExpertiseValidation"></div>
          </div>
          <hr>
          <div class="container-fluid border mb-2" id="addSelectedSkills" style="height:150px;">
          
          </div>
          <div class="container-fluid" id="addResultSkills" style="height:150px;">
            <h6 class='mb-2'>No results yet.</h6>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sub" id="btnThirdBack"><i class="fas fa-angle-double-left"></i> Back</button>
        <button type="button" class="btn btn-main" id="btnThirdNext"><i class="fas fa-angle-double-right"></i> Next</button>
      </div>
    </div>
  </div>
</div>
<!-- 4th Modal -->
<div class="modal fade" id="employersAddJobPricing" tabindex="-1" role="dialog" aria-labelledby="addPricing" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 text-arial-rounded" id="addPricing">Pricing</h5>
      </div>
      <div class="modal-body">
        <div id="jobPricingContainer">
          <h6>Pay only for fixed price to the whole output.</h6>
          <div class="form-group">
              <div class="input-group">
                  
              </div>
              <input type="number" class="form-control" id="txtJobPricing">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sub" id="btnFourthBack"><i class="fas fa-angle-double-left"></i> Back</button>
        <button type="button" class="btn btn-main" id="btnFourthNext"><i class="fas fa-angle-double-right"></i> Next</button>
      </div>
    </div>
  </div>
</div>