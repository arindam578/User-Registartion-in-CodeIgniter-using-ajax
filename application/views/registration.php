<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
    <style>
        .card {
            box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.75);
        }

        .card-header {
            
            background: linear-gradient(to right, blue, black, blue);
            color: white;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5 px-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Registration</h3>
                    </div>
                    <div class="card-body">
                        <form id="registration-form">
                            <div class="form-group">
                                <label for="userName" class="">Name: </label>
                                <input type="text" name="userName" id="userName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="userMobile" class="">Mobile: </label>
                                <input type="number" name="userMobile" id="userMobile" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="userEmail" class="">Email: </label>
                                <input type="email" name="userEmail" id="userEmail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="userPassword" class="">Password: </label>
                                <input type="password" name="userPassword" id="userPassword" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-12 text-center mt-3">
                                    <button type="reset" class="btn btn-danger btn-lg w-25">Reset</button>
                                    <button type="submit" class="btn btn-primary btn-lg w-25">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#registration-form').on('submit', function(event) {
                event.preventDefault();
                var userName = $('#userName').val();
                var userMobile = $('#userMobile').val();
                var userEmail = $('#userEmail').val();
                var userPassword = $('#userPassword').val();

                if (userName == '') {
                    $('#userName').focus();
                    swal('Required', 'User name is required', 'warning');
                    return false;
                }
                if (userMobile == '') {
                    $('#userMobile').focus();
                    swal('Required', 'Mobile number is required', 'warning');
                    return false;
                }
                if (userEmail == '') {
                    $('#userEmail').focus();
                    swal('Required', 'Email is required', 'warning');
                    return true;
                }
                if (userPassword == '') {
                    $('#userPassword').focus();
                    swal('Required', 'Password is required', 'warning');
                    return false;
                }
                $.ajax({
                    url: "<?=base_url();?>Registration/user_registration",
                    method: "POST",
                    data: {
                        userName: userName,
                        userMobile: userMobile,
                        userEmail: userEmail,
                        userPassword: userPassword,
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            swal({
                                title: data.title,
                                text: data.message,
                                type: "success"
                            },function(){
                                $('#registration-form').trigger('reset');
                                $('#userName').focus();
                            });
                        } else {
                            swal({
                                title: data.title,
                                text: data.message,
                                type: "error"
                            },function(){
                                $('#registration-form').trigger('reset');
                            });
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>