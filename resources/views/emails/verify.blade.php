<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Welcome! Verify your Email Address.</h2>

        <div>
            Thank you for creating an account with MyTailor.
            Please follow the link below to activate your account.
            {{ URL::to('register/verify/' . $confirmation_code) }}.<br/>

        </div>

    </body>
</html>