<div class="container bg-main" style="padding-top:80px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5><?php echo $user_info['firstname'] ." ". $user_info['lastname']; ?></h5>
                    <button class="btn btn-main"><i class="fas fa-plus-circle    "></i> Post a job</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <!-- DRAFTS CARD -->
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Drafts</h5>
                    <button class="btn btn-main btn-sm" data-toggle="tooltip" data-placement="auto" title="View All Drafts"><i class="fas fa-list-ul"></i></button>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
            <!-- POSTINGS CARD -->
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Postings</h5>
                    <button class="btn btn-main btn-sm" data-toggle="tooltip" data-placement="auto" title="View All Postings"><i class="fas fa-list-ul"></i></button>
                </div>
                <div class="card-body">
                
                </div>
            </div>
        </div>
        <div class="col-md-4">
        
        </div>
    </div>
</div>