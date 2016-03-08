@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">


                        <form class="form-horizontal" role="form" id="form_login">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email"
                                           value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button  type="submit" class="btn btn-primary btn_login">Login</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section("js")

    <script language="javascript">


        $(document).ready(function () {


            $("#form_login").submit(function (event) {

                event.preventDefault();
                get_logged_user();
            });

        });


        function get_logged_user() {

            var email = $("#email").val();
            var password = $("#password").val();

            $.ajax({
                type: "GET",
                url: host + '/login_api',
                data: {email: email, password: password}
            }).done(function (response) {

                var status = response.status;

                if (status == 200) {
                    var loggedUser = response.user_found;
                    var alertType = "alert alert-success";
                    var alertMsg = "login with Success";


                } else {

                    var alertType = "alert alert-danger";
                    var alertMsg = "login with Error";

                    var listPanel = '<ul><li>' + alertMsg + '</li></ul>';
                    var panelAlert = '<div id="panelAlert" class="'+ alertType +'">'+listPanel+'</div>';

                    $(".panel-body").append(panelAlert);


                }




            });

        }


    </script>

@endsection