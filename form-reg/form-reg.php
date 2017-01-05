<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="user-reg.php" method="post">
        <p>
            <label>
                Input Name please:
                <input name="userName" type="text" placeholder="Input Name" required/>
            </label>
        </p>
        <p>
            <label>
                Input Last Name please:
                <input name="userLastName" type="text" placeholder="Input Last Name"/>
            </label>
        </p>
        <p>
            <label>
                Input Age please:
                <input name="userAge" type="date" placeholder="Input Age"/>
            </label>
        </p>
        <p>
            Input Sex please:
            <label>
                Male:
                <input name="userSex" type="radio" value="Male"/>
            </label>
            <label>
                Female:
                <input name="userSex" type="radio" value="Female" checked/>
            </label>
        </p>
        <p>
            <label>
                Input Password please:
                <input name="userPassword" type="password" placeholder="Input Password" required/>
            </label>
        </p>
        <p>
            <label>
                Input Password check please:
                <input name="userPasswordCheck" type="password" placeholder="Input Password check" required/>
            </label>
        </p>
        <p>
            <label>
                Input e-mail please:
                <input name="userEmail" type="email" placeholder="Input e-mail" required/>
            </label>
        </p>
        <input type="submit" value="Send">
    </form>
</body>
</html>