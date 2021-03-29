<!-- 1st MODAL -->
<div class="modal fade" id="employersAddJob" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 text-arial-rounded" id="addCategory">Job Category</h5>
        <!-- <h5 class="modal-title w-100" id="addTitle">Post a Job</h5> -->
      </div>
      <div class="modal-body">
        <div id="jobFirstContainer">
          <div class="form-group">
            <input type="text" id="txtJobID" class="form-control d-none" placeholder="Job ID">
            <input type="text" class="form-control d-none" id="txtJobDone" placeholder="Job Done">
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
<div class="modal fade" id="employersAddJobInfo" tabindex="-1" role="dialog" aria-labelledby="addTitleDescription" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 text-arial-rounded" id="addTitleDescription">Job Info</h5>
      </div>
      <div class="modal-body">
        <div id="jobSecondContainer">
        <div class="form-group">
            <input type="text" class="form-control d-none" id="txtJobInfoDone" placeholder="Job Done">
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
          <div class="form-group">
          <label class="text-arial-rounded" for="txtJobDescription">Description</label>
          <small>(50 - 10000 characters)</small>
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
        <h5 class="modal-title w-100 text-arial-rounded" id="addExpertise">Job Expertise</h5>
      </div>
      <div class="modal-body">
        <div id="jobExpertiseContainer">
          <div class="form-group">
            <label class="text-arial-rounded" for="txtAddSkills">Expertise are based from the category and specialty you set to this job.</label>
            <input type="text" class="form-control" id="txtAddSkills" placeholder="What skills do you need?">
            <div class="invalid-feedback" id="txtJobExpertiseValidation">sadadadadadsadadsa</div>
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
        <h5 class="modal-title w-100 text-arial-rounded" id="addPricing">Job Pricing</h5>
      </div>
      <div class="modal-body">
        <div id="jobPricingContainer">
          <h6>Pay only for fixed price to the whole output.</h6>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">&#8369;</span>
            </div>
            <input type="number" class="form-control" placeholder="0.00" id="txtJobPricing">
            <div class="invalid-feedback" id="txtJobPricingValidation"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sub" id="btnFourthBack"><i class="fas fa-angle-double-left"></i> Back</button>
        <button type="button" class="btn btn-main" id="btnFourthNext"> Publish</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteJobPostModal" tabindex="-1" role="dialog" aria-labelledby="deletePost" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 text-arial-rounded" id="deletePost">Delete this post?</h5>
      </div>
      <div class="modal-body">
          <input type="hidden" id="txtDeleteJobPostID">
          <h6>Job post will be deleted permanently. Do you want to continue?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sub" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="btn btn-main" id="btnDeleteJobPost"><i class="fas fa-trash-alt"></i> Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteJobDraftModal" tabindex="-1" role="dialog" aria-labelledby="deleteDraft" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 text-arial-rounded" id="deleteDraft">Delete this draft?</h5>
      </div>
      <div class="modal-body">
          <input type="hidden" id="txtDeleteJobDraftID">
          <h6>Draft will be deleted permanently. Do you want to continue?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sub" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="btn btn-main" id="btnDeleteJobDraft"><i class="fas fa-trash-alt"></i> Delete</button>
      </div>
    </div>
  </div>
</div>