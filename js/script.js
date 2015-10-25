$(function () {
    $('.btn-reg').click(function (event) {
        event.preventDefault();
        //pobieramy z htmla wpisane wartosci i przypisujemy je do zmiennych tak samo nazwanych
        var name = document.register.name.value;
        var surname = document.register.surname.value;
        var address = document.register.address.value;
        var email = document.register.email.value;
        var pwd = document.register.pwd.value;
        var pwd2 = document.register.pwd2.value;
        $.ajax({
            method: "POST",
            url: "api/AJAXServer.php",
            //przypisujemy do zapytania wpisane atrybuty o kluczu name, surname, itp.
            data: {
                regName: name,
                regSurname: surname,
                regAddress: address,
                regEmail: email,
                regPwd: pwd,
                regPwd2: pwd2
            },
            dataType: "json",
            success: function (json) {
                console.log(json);
            }
        })
    })

    $('#log-in').click(function (event) {
        event.preventDefault();
        //pobieramy z htmla wpisane wartosci i przypisujemy je do zmiennych tak samo nazwanych
        var login = document.header.login.value;
        var password = document.header.password.value;
        $.ajax({
            method: "POST",
            url: "api/AJAXServer.php",
            //przypisujemy do zapytania wpisane atrybuty o kluczu name, surname, itp.
            data: {
                loginEmail: login,
                loginPassword: password
            },
            dataType: "json",
            success: function (json) {
                console.log(json);
                $('#loginForm').hide();
            }
        })
    })

    $('#log-out').click(function (event) {
        event.preventDefault();
        $('#logoutForm').hide();
        $.ajax({
            method: "POST",
            url: "api/AJAXServer.php",
            data: {
                killUser: true
            },
            dataType: "json",
            success: function (json) {
                console.log(json);
                $('#loginForm').show();
            }
        })
    })
});