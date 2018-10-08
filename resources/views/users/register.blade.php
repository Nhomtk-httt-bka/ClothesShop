@extends('layouts.auth_user')

@section('content')
    <!-- append rather overwriting -->
    @parent
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <style>
        .card{
            margin-top: 60px;
        }
      ul#stepForm, ul#stepForm li {
        margin: 0;
        padding: 0;
      }
      ul#stepForm li {
        list-style: none outside none;
      } 
      label{margin-top: 10px;}
      .help-inline-error{color:red;}
    </style>
    <div class="card">
        <div class="card-header">
          <h3 class="panel-title">Complete this form in quick 3 steps!  <a  href="{{ url('home') }}" class="btn btn-primary float-right">Home</a></h3>
        </div>
        <div class="card-body">
          <form name="basicform" id="basicform" method="post" action="{{ route('register') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div id="sf1" class="frm">
              <fieldset>
                <legend>Step 1 of 3</legend>

                <div class="form-group">
                  <label class="col-lg-2 control-label" for="uname">Your Name: </label>
                  <div class="col-lg-6">
                    <input type="text" placeholder="Your Name" id="uname" name="name" class="form-control" autocomplete="off" required>
                  </div>
                </div>
                <div class="clearfix" style="height: 10px;clear: both;"></div>


                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button> 
                  </div>
                </div>

              </fieldset>
            </div>

            <div id="sf2" class="frm" style="display: none;">
              <fieldset>
                <legend>Step 2 of 3</legend>


                <div class="form-group">
                  <label class="col-lg-2 control-label" for="uemail">Your Email: </label>
                  <div class="col-lg-6">
                    <input type="email" placeholder="Your Email" id="uemail" name="email" class="form-control" autocomplete="off" required>
                  </div>
                </div>

                <div class="clearfix" style="height: 10px;clear: both;"></div>



                <div class="clearfix" style="height: 10px;clear: both;"></div>

                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                    <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button> 
                  </div>
                </div>

              </fieldset>
            </div>

            <div id="sf3" class="frm" style="display: none;">
              <fieldset>
                <legend>Step 3 of 3</legend>

                <div class="form-group">
                  <label class="col-lg-2 control-label" for="upass1">Password: </label>
                  <div class="col-lg-6">
                    <input type="password" placeholder="Your Password" id="upass1" name="password" class="form-control" autocomplete="off">
                  </div>
                </div>
                <div class="clearfix" style="height: 10px;clear: both;"></div>

                <div class="form-group">
                  <label class="col-lg-2 control-label" for="upass1">Confirm Password: </label>
                  <div class="col-lg-6">
                    <input type="password" placeholder="Confirm Password" id="upass2" name="confirmed" class="form-control" autocomplete="off">
                  </div>
                </div>

                <div class="clearfix" style="height: 10px;clear: both;"></div>


                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                    <input class="btn btn-primary open3" type="submit" name="Submit"></input> 
                  </div>
                </div>

              </fieldset>
            </div>
          </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.js') }}"></script>
    <script type="text/javascript">
      
      jQuery().ready(function() {

        // validate form on keyup and submit
        var v = jQuery("#basicform").validate({
          rules: {
            name: {
              required: true,
              minlength: 2,
              maxlength: 16
            },
            email: {
              required: true,
              minlength: 2,
              email: true,
              maxlength: 100,
            },
            password: {
              required: true,
              minlength: 6,
              maxlength: 15,
            },
            confirmed: {
              required: true,
              minlength: 6,
              equalTo: "#upass1",
            }

          },
          errorElement: "span",
          errorClass: "help-inline-error",
        });

        $(".open1").click(function() {
          if (v.form()) {
            $(".frm").hide("fast");
            $("#sf2").show("slow");
          }
        });

        $(".open2").click(function() {
          if (v.form()) {
            $(".frm").hide("fast");
            $("#sf3").show("slow");
          }
        });
        
        // $(".open3").click(function() {
        //   if (v.form()) {
        //     $("#basicform").html('<h2>Thanks , and back home to login.</h2>');
        //   }
        // });
        
        $(".back2").click(function() {
          $(".frm").hide("fast");
          $("#sf1").show("slow");
        });

        $(".back3").click(function() {
          $(".frm").hide("fast");
          $("#sf2").show("slow");
        });

      });
    </script>
@endsection



