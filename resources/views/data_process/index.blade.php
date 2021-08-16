@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/datap.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex flex-row">
                    <div class="flex-grow-1">
                    {{ __('Data Processing') }}
                    </div>
                <button class="btn btn-primary">Add a New Case</button>
                </div>
            </div>
            <!-- <img class="card-img-top" src="{{ asset('images/arcd.png') }}" alt="About Image"> -->
            <div class="card-body">
            <div class="container">
<div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
        <p>Step 4</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
        <p>Step 5</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
        <p>Step 6</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
        <p>Step 7</p>
      </div>
    </div>
  </div>
  
  <form role="form" action="" method="post">
    <div class="row setup-content" id="step-1">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 1</h3>
          <div class="form-group">
            <label class="control-label">Case Title</label>
            <input id="case-title" maxlength="100" type="text" required="required" class="form-control" placeholder="Enter the Case Title">
          </div>
          <div class="form-group">
            <label class="control-label">MMLA Goal</label>
            <textarea id="mmla-goal" id="" cols="30" rows="5" class="form-control" placeholder="MMLA Goal"></textarea>
          </div>
          <div class="form-group">
            <label class="control-label">Lesson Date</label>
            <input id="lesson-case-date" type="date" class="form-control">
          </div>
          <div class="form-group">
            <label class="control-label">Lesson Start Time</label>
            <input id="lesson-case-start-time" type="time" class="form-control">
          </div>
          <div class="form-group">
            <label class="control-label">Lesson End Time</label>
            <input id="lesson-case-end-time" type="time" class="form-control">
          </div>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-2">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 2</h3>
          <div class="form-group">
            <div class="d-flex">
                    <div class="form-group">
                        <label class="control-label">Activity 1</label>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Lesson Start Time</label>
                        <input class="form-control activity-lesson-start-time" data-index="1" type="date">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Lesson End Time</label>
                        <input class="form-control activity-lesson-end-time" data-index="1" type="date">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Activity Type</label>
                        <select class="form-control activity-type" data-index="1">
                            <option value="individual">Individual</option>
                            <option value="group">Group</option>
                            <option value="collaborate">Collaborate</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label class="control-label">Timezone</label>
                    <input class="form-control activity-time-zone" data-index="1" type="text">
                    </div>
            </div>
          </div>
          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-3">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 3</h3>
          <div class="d-flex">
                    <div class="form-group">
                        <label class="control-label">Platform Tool 1</label>
                    </div>
                    <div class="form-group">
                        <label class="control-label">App Name</label>
                        <select class="app-name form-control" data-index="1">
                            <option value="Google_form">Google_form</option>
                            <option value="OpenSpace_video">OpenSpace_video</option>
                            <option value="Graasp">Graasp</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">ACtivity Type</label>
                        <select class="activity-type form-control" data-index="1">
                            <option value="Post Activity">Post Activity</option>
                            <option value="Pre Lesson">Pre Lesson</option>
                            <option value="Post Lesson">Post Lesson</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Frequency</label>
                        <input type="number" class="frequency form-control" data-index="1">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Timezone</label>
                        <input type="text" class="timezone form-control" data-index="1">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Count of Data Files</label>
                        <input type="number" class="data-files-count form-control" data-index="1">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Data File Relation</label>
                        <select class="data-file-corresponds form-control" data-index="1">
                            <option value="All Students/Activity">All Students/Activity</option>
                            <option value="One student/activity">One student/activity</option>
                            <option value="One student/lesson">One student/lesson</option>
                            <option value="All student/lesson">One student/lesson</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Repo Type</label>
                        <select class="repo-type form-control" data-index="1">
                            <option value="API">API</option>
                            <option value="Gdrive">Gdrive</option>
                            <option value="Local_system">Local_system</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Repo Location</label>
                        <input type="text" class="repo-location form-control" data-index="1">
                    </div>
            </div>
          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-4">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 4</h3>





          <div class="container">
            <div class="row">
                <div class="col">
                #
                </div>
                <div class="col">
                Video Features
                </div>
                <div class="col">
                Google Form
                </div>
                <div class="col">
                Graasp
                </div>
            </div>
            <div class="row">
                <div class="col">
                Requires Synchronization
                </div>
                <div class="col">
                    <input type="radio" value="Yes" name="Video" class="Video_features1"/> Yes
                    <input type="radio" value="No" name="Video" class="Video_features1"/> No
                    <div class="">
                        <input type="text" class=""/>
                    </div>
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Google_form"/> Yes
                     <input type="radio" value="No" name="Google_form"/> No
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Graasp"/> Yes
                     <input type="radio" value="No" name="Graasp"/> No
                </div>
            </div>
            <div class="row">
                <div class="col">
                Requires Time Homo Generation
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Video" class="Video_features2"/> Yes
                     <input type="radio" value="No" name="Video" class="Video_features2"/> No
                     <div class="">
                        <span>From</span>
                        <input type="number" class=""/>
                        <span>to</span>
                        <input type="number" class=""/>
                        <button type="submit">Click</button>
                     </div>
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Google_form"/> Yes
                     <input type="radio" value="No" name="Google_form"/> No
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Graasp"/> Yes
                     <input type="radio" value="No" name="Graasp"/> No
                </div>
            </div>
            <div class="row">
                <div class="col">
                Requires Data Trimming
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Video" class="Video_features3"/> Yes
                     <input type="radio" value="No" name="Video" class="Video_features3"/> No
                     <div class="">
                        <span> Trim Rows From</span>
                        <input type="number" class=""/>
                        <span>to</span>
                        <input type="number" class=""/>
                        <button type="submit">Click</button>
                     </div>
                     <div class="">
                        <span> Trim Columns From</span>
                        <input type="number" class=""/>
                        <span>to</span>
                        <input type="number" class=""/>
                        <button type="submit">Click</button>
                     </div>
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Google_form"/> Yes
                     <input type="radio" value="No" name="Google_form"/> No
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Graasp"/> Yes
                     <input type="radio" value="No" name="Graasp"/> No
                </div>
            </div>
            <div class="row">
                <div class="col">
                Requires Denoising
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Video" class="Video_features3"/> Yes
                     <input type="radio" value="No" name="Video" class="Video_features3"/> No
                     <div class="">
                        <input type="checkbox" id="duplicates" name="duplicates" value="">
                        <label for="duplicates"> Remove duplicates</label><br>
                     </div>
                     <input type="text" class="" />
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Google_form"/> Yes
                     <input type="radio" value="No" name="Google_form"/> No
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Graasp"/> Yes
                     <input type="radio" value="No" name="Graasp"/> No
                </div>
            </div>
        </div>









          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-5">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          
          
          <h3> Step 5</h3>
          
          
          <div class="container">
            <div class="row">
                <div class="col">
                #
                </div>
                <div class="col">
                Video Features
                </div>
                <div class="col">
                Google Form
                </div>
                <div class="col">
                Graasp
                </div>
            </div>
            <div class="row">
                <div class="col">
                Requires Transformation
                </div>
                <div class="col">
                    <input type="radio" value="Yes" name="Video" class="Video_features1"/> Yes
                    <input type="radio" value="No" name="Video" class="Video_features1"/> No
                    <span> Transform </span>
                    //<input type="text" class="" placeholder="Add Rule"/>
                    <button id="Transformation" type="submit"> Add Rule </button>
                    
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Google_form"/> Yes
                     <input type="radio" value="No" name="Google_form"/> No
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Graasp"/> Yes
                     <input type="radio" value="No" name="Graasp"/> No
                </div>
             </div>
            
            
            <div class="row">
                <div class="col">
                Enter Actors column no.
                </div>
                <div class="col">
                
                    <input type="number" class="" />
                    <button id="" type="submit"> Add Rule </button>
                    
                </div>
                <div class="col">
                     <input type="number" class="" />
                </div>
                <div class="col">
                     <input type="number" class="" />
                </div>
             </div>
            
            
            <div class="row">
                <div class="col">
                Enter Verbs column no.
                </div>
                <div class="col">
                    <input type="number" class="" />
                    <button id="" type="submit"> Add Rule </button>
                    
                </div>
                <div class="col">
                     <input type="number" class="" />
                </div>
                <div class="col">
                     <input type="number" class="" />
                </div>
             </div>
             
             
            <div class="row">
                <div class="col">
                Enter objects column no.
                </div>
                <div class="col">
                    <input type="number" class="" />
                    <button id="" type="submit"> Add Rule </button>
                    
                </div>
                <div class="col">
                     <input type="number" class="" />
                </div>
                <div class="col">
                     <input type="number" class="" />
                </div>
             </div>
             
             
             
            <div class="row">
                <div class="col">
                Variables excluder
                </div>
                <div class="col">
                    
                    <input type="number" class="" />
                    <button id="" type="submit"> Add New </button>
                    <span>Rule</span>
                    <input type="number" class="" />
                    <button id="" type="submit"> Add Rule </button>
                    
                </div>
                <div class="col">
                     
                    <input type="number" class="" />
                    <button id="" type="submit"> Add New </button>
                    <span>Rule</span>
                    <input type="number" class="" />
                    <button id="" type="submit"> Add Rule </button>
                </div>
                <div class="col">
                     
                    <input type="number" class="" />
                    <button id="" type="submit"> Add New </button>
                    <span>Rule</span>
                    <input type="number" class="" />
                    <button id="" type="submit"> Add Rule </button>
                </div>
             </div>
             
             <div class="row">
                <div class="col">
                Cases excluder
                </div>
                <div class="col">
                    <div class="d-flex">
                    <spanFrom</span>
                    <input type="number" class="" />
                    <spanTo</span>
                    <input type="number" class="" />
                    </div>
                    <button id="" type="submit"> Add New </button>
                    
                </div>
                <div class="col">
                     
                    <div class="d-flex">
                    <spanFrom</span>
                    <input type="number" class="" />
                    <spanTo</span>
                    <input type="number" class="" />
                    </div>
                    <button id="" type="submit"> Add New </button>
                </div>
                <div class="col">
                     
                    <div class="d-flex">
                    <spanFrom</span>
                    <input type="number" class="" />
                    <spanTo</span>
                    <input type="number" class="" />
                    </div>
                    <button id="" type="submit"> Add New </button>
                </div>
             </div>
             
             
             
             <div class="row">
                <div class="col">
                Requires Cases Aggregator
                </div><div class="col">
                    <input type="radio" value="Yes" name="Video" class="Video_features1"/> Yes
                    <input type="radio" value="No" name="Video" class="Video_features1"/> No
                    
                    
                    <button id="Aggregator1" type="submit"> Add Rule </button>
                    
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Google_form"/> Yes
                     <input type="radio" value="No" name="Google_form"/> No
                     
                     <button id="Aggregator2" type="submit"> Add Rule </button>
                </div>
                <div class="col">
                     <input type="radio" value="Yes" name="Graasp"/> Yes
                     <input type="radio" value="No" name="Graasp"/> No
                     
                     <button id="Aggregator3" type="submit"> Add Rule </button>
                </div>
             </div>
    
            </div>
          
                
          
          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-6">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 6</h3>
          
          
          
          
          <div class="form-group">
            <label class="control-label">Company Name</label>
            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name">
          </div>
          <div class="form-group">
            <label class="control-label">Company Address</label>
            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address">
          </div>
          
          
          
          
          
          
          
          
          
          
          
          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-7">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 3</h3>
          <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
          <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>
  
</div>
            </div>
            </div>
        </div>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js'>
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<script src="/js/datap.js"></script>
@endsection
