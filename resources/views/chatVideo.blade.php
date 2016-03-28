@extends('app')




@section("css")

    <link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet"
          type="text/css"/>
    <style>

        #webcam {
            float: left;
        }

        #volumeMeter {
            background-image: url('ledsbg.png');
            width: 19px;
            height: 133px;
            padding-top: 5px;
        }

        #volumeMeter img {
            padding-left: 4px;
            padding-top: 1px;
            display: block;
        }

        .ui-slider {
            background: none;
            background-image: url('trackslider.png');
            border: 0;
            height: 107px;
            margin-top: 16px;
        }

        .ui-slider .ui-slider-handle {
            width: 14px;
            height: 32px;
            margin-left: 7px;
            margin-bottom: -16px;
            background: url(volumeslider.png) no-repeat;
        }

        #volumePanel {
            -moz-border-radius: 0px 5px 5px 0px;
            border-radius: 0px 5px 5px 0px;
            background-color: #4B4B4B;
            width: 55px;
            height: 160px;
            -moz-box-shadow: 0px 3px 3px #333333;
            -webkit-box-shadow: 0px 3px 3px #333333;
            shadow: 0px 3px 3px #333333;
        }

        #setupPanel {
            width: 650px;
            height: 30px;
            margin: 5px;
        }
    </style>


    <style>

        .send_bt {
            border: 2px groove rgba(123, 132, 123, 0.24);
            margin-bottom: -11px;
            margin-top: 17px;
            height: 44px;

        }

        .msg_txt {
            width: 320px;
        }

        .message {
            background-color: rgba(197, 186, 204, 0.62);
            border-radius: 20px;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-left: 15px;
            color: #2D46D2;
            border-bottom: 2px solid #4EDA4E;
        }

        .message:hover {
            background-color: rgba(164, 204, 157, 0.62);
            cursor: hand;
        }

        .message:active {
            background-color: rgb(115, 129, 163);
        }

        .sender_label {
            color: green;
            font-family: Consolas;
            font-size: medium;
        }

        .sender_span {
            color: black;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: small;
        }

        .userList {

            background-color: greenyellow;
        }

        .Friend_video_Box {

            background-color: black;
            height: 444px;
            border: 3px solid rgba(0, 128, 16, 0.85);
            padding-left: 531px;
            padding-top: 287px;
        }

        .message_box {

            background-color: white;

        }

        .my_video_box {

            width: 150px;
            background-color: rgba(28, 37, 34, 0.44);
            height: 150px;
            border: 1px solid;
        }

        .user_list_chat {

            margin-left: auto !important;
            max-height: 449px;
        }

        .msgs_area {

            width: 377px;
            height: 370px;
        }

        .msg_bar {
            padding: 0px !important;
            width: 350px;
            background-color: #E5EFFF;
        }

        .col-users {

            margin-left: -9%;
        }

        .chat_footer {

            width: 376px;
            background-color: white;
        }

        #webcam {
            width: 600px !important;
        }


    </style>

@endsection

@section('content')
    <div class="">


        <div class="row">

            <div class="col-md-3 col-users ">

                <div class="user_list_chat">

                    <ul>
                        @foreach($users as $user)

                            <li class="user_chat animation-slideExpandUp" id='{{ $user->id }}'><a
                                        href="javascript:void(0)"
                                        onclick="set_user('{{ $user->id }}','{{ $user->name }}','{{ $user->avatar }}')"><img
                                            title="{{ $user->name  }}"
                                            src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png"
                                            class="user_avatar"></a>
                            </li>

                        @endforeach


                    </ul>


                </div>


            </div>{{--col-md-3--}}

            <div class="col-md-6">


                <div id="webcam" class="Friend_video_Box">
                </div>
                <div id="volumePanel" style="float:left;position:relative;top:10px;">
                    <div id="volumeMeter" style="position:absolute;top:10px;left:7px;float:left;">
                        <img id="LedBar32" src="{{ URL::asset('ledred.png') }}">
                        <img id="LedBar31" src="{{ URL::asset('ledred.png') }}">
                        <img id="LedBar30" src="{{ URL::asset('ledred.png') }}">
                        <img id="LedBar29" src="{{ URL::asset('ledred.png') }}">
                        <img id="LedBar28" src="{{ URL::asset('ledred.png') }}">
                        <img id="LedBar27" src="{{ URL::asset('ledred.png') }}">
                        <img id="LedBar26" src="{{ URL::asset('ledred.png') }}">
                        <img id="LedBar25" src="{{ URL::asset('ledred.png') }}">
                        <img id="LedBar24" src="{{ URL::asset('ledred.png') }}">
                        <img id="LedBar23" src="{{ URL::asset('ledred.png') }}">
                        <img id="LedBar22" src="{{ URL::asset('ledred.png') }}">
                        <img id="LedBar21" src="{{ URL::asset('ledred.png') }}">

                        <img id="LedBar20" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar19" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar18" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar17" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar16" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar15" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar14" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar13" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar12" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar11" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar10" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar9" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar8" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar7" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar6" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar5" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar4" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar3" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar2" src="{{ URL::asset('ledgreen.png') }}">
                        <img id="LedBar1" src="{{ URL::asset('ledgreen.png') }}">
                    </div>
                    <div id="slider" style="position:absolute;top:10px;left:30px;">
                    </div>
                </div>
                <br clear="both"/>

                <div id="setupPanel">
                    <img src="{{ URL::asset('webcamlogo.png') }}" style="vertical-align:text-top"/>
                    <select id="cameraNames" size="1" onChange="changeCamera()"
                            style="width:145px;font-size:10px;height:25px;">
                    </select>
                    <img src="{{ URL::asset('miclogo.png') }}" style="vertical-align:text-top"/>
                    <select id="microphoneNames" size="1" onChange="changeMicrophone()"
                            style="width:128px;font-size:10px;height:25px;">
                    </select>
                </div>


                <div id="my_video_box" class="my_video_box"></div>

            </div>{{--col-md-6--}}


            <div class="col-md-3" style="z-index: -1;">


                <div class="chat_panels">


                    <div class="msg_bar">


                        <div id="msgs_area" class="msgs_area">

                            <div id="msgs">


                            </div>


                        </div>


                        <div class="chat_footer">

                            <div class="is_typing"></div>
                            <input onkeypress="is_typing()" type="text" id="msg_txt" class="msg_txt"
                                   placeholder="Enter your message"/>

                            <button onclick="send_message()" class="send_btn">Send</button>
                        </div>


                    </div>


                </div>


            </div>{{--col-md-3--}}

        </div>{{--row--}}


        {{--row--}}


    </div>{{--container--}}








@endsection


@section("js")


    <script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
    <script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script language="JavaScript" src="{{ URL::asset('libs/js/scriptcam.js') }}"></script>


    <script>


        $(document).ready(function () {


            var userName = '<?php echo $_GET['username'] ?>';
            var room = '<?php echo $_GET['room'] ?>';

            console.log("user name " + userName + " room --> " + room);


            $("#my_video_box").scriptcam({
                chatWindow: 'chatWindow',
                onError: onError,
                promptWillShow: promptWillShow,
                showMicrophoneErrors: false,
                onWebcamReady: onWebcamReady,
                connected: chatStarted,
                setVolume: setVolume,
                timeLeft: timeLeft
            });


            $("#webcam").scriptcam({
                chatWindow: 'chatWindow',
                onError: onError,
                promptWillShow: promptWillShow,
                showMicrophoneErrors: false,
                onWebcamReady: onWebcamReady,
                connected: chatStarted,
                setVolume: setVolume,
                timeLeft: timeLeft,
                loginName: userName,
                chatRoom: room,
                width: 600,
                height: 500
            });
            setVolume(0);
            $("#slider").slider({animate: true, min: 0, max: 100, value: 50, orientation: 'vertical', disabled: true});
            $("#slider").bind("slidechange", function (event, ui) {
                $.scriptcam.changeVolume($("#slider").slider("option", "value"));
            });
            $("#message").keypress(function (event) {
                if (event.which == 13) {
                    event.preventDefault();
                    $.scriptcam.sendMessage($('#message').val());
                    $('#message').val('');
                }
            });
        })
        ;
        function closeCamera() {
            $("#slider").slider("option", "disabled", true);
            $.scriptcam.closeCamera();
        }
        function onError(errorId, errorMsg) {
            alert(errorMsg);
        }
        function chatStarted() {
            $("#slider").slider("option", "disabled", false);
        }
        function onWebcamReady(cameraNames, camera, microphoneNames, microphone, volume) {
            $("#slider").slider("option", "value", volume);
            $.each(cameraNames, function (index, text) {
                $('#cameraNames').append($('<option></option>').val(index).html(text))
            });
            $('#cameraNames').val(camera);
            $.each(microphoneNames, function (index, text) {
                $('#microphoneNames').append($('<option></option>').val(index).html(text))
            });
            $('#microphoneNames').val(microphone);
        }
        function promptWillShow() {
            alert('A security dialog will be shown. Please click on ALLOW and wait for a second chat partner to arrive.');
        }
        function setVolume(value) {
            value = parseInt(32 * value / 100) + 1;
            for (var i = 1; i < value; i++) {
                $('#LedBar' + i).css('visibility', 'visible');
            }
            for (i = value; i < 33; i++) {
                $('#LedBar' + i).css('visibility', 'hidden');
            }
        }
        function timeLeft(value) {
            $('#timeLeft').html(value);
        }
        function changeCamera() {
            $.scriptcam.changeCamera($('#cameraNames').val());
        }
        function changeMicrophone() {
            $.scriptcam.changeMicrophone($('#microphoneNames').val());
        }
    </script>












    <script language="javascript">


        var receiver_name = "";
        var receiver_id = "";
        var receiver_avatar = "";
        var is_typing_flag = false;

        $('.msg_txt').val("");
        socket.on('message', function (js_data) {

            $('#msgs').append('<div class="sender_msg animation-stretchRight"><img class="sender_path" ' +
                    'src=' + receiver_avatar + '>&nbsp;&nbsp;&nbsp;' + js_data + '</div>');


        });


        socket.on('is_typing', function (js_data) {
            $('.is_typing').html(js_data + ' is typing');

            console.log(js_data + ' is typing');
            if (!is_typing_flag) {

                $('.is_typing').animate({'opacity': 1}, 500);
                is_typing_flag = true;

                setTimeout(function () {
                    is_typing_flag = false;
                    $('.is_typing').animate({
                        'opacity': 0
                    }, 500);
                }, 1000);


            }


        });


        function send_message() {


            var msg = $('.msg_txt').val();
            $('#msgs').append('<div class="current_user_msg animation-stretchLeft">' + msg + '</div>');
            socket.emit('message', msg, receiver_id);
            $('.msg_txt').val("");


        }


        function is_typing() {

            socket.emit('is_typing', logged_user.user_name, receiver_id);


        }


        function set_user(id, user_name, user_avatar) {


            $('.user_chat').removeClass("active_user");
            $('#' + id).addClass("active_user");
            $('#choosen_user').html(user_name);
            console.log("id ---> " + id);
            console.log("name ---> " + user_name);
            console.log("avatar --->" + user_avatar);
            receiver_id = id;
            receiver_avatar = user_avatar;

        }

    </script>

@endsection


