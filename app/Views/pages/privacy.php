<style>
.btn:focus,.btn:active {
   outline: none !important;
   box-shadow: none;
}
</style>
<div id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent" id="myNav">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><div class="logo-word ml-3"></div></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </nav>
</div>

<div class="container-fluid" style="padding-top:70px;">
    <div class="row">
        <div class="col-lg-3 offset-1">
            <div id="accordion">
                <div class="card border-0">
                    <div class="card-header">
                            <button class="btn btn-block text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-angle-right"></i> Data Collected</button>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body bg-main">
                            <ul class="list-group list-group-flush border-right border-bottom">
                                <a href="#data-collected" class="list-group-item list-group-item-action list-group-item-light bg-main"><i class="fas fa-dot-circle"></i> Data you provide</a>
                                <a href="#data-shared" class="list-group-item list-group-item-action list-group-item-light bg-main"><i class="fas fa-dot-circle"></i> Data Shared</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border-0">
                    <div class="card-header">
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div id="data-policy">
                <div class="h1 text-monospace">Data Policy</div>
                <div class="text-monospace">This policy describes the information we process to support our product Layboard.</div>
            </div>
            <div id="data-collected" class="mt-5">
                <div class="h2 text-monospace">What kinds of data do we collect?</div>
                <div class="text-monospace">We must process the data or information about you. The information we collect depends on how you use our product.</div>


            </div>
        </div>
    </div>
</div>