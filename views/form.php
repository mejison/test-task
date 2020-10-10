<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="/index.php?action=postAction">
        <fieldset>
            <legend>Contact form</legend>
            <p>
                <label for="name">
                    Name <em>*</em>
                </label>
                <input type="text" name="name" id="name" />
            </p>
            <p>
                <label for="email">
                    E-mail
                </label>
                <input type="email" name="email" id="email" />
            </p>
        </fieldset>
        <p>
            <input type="submit" value="Submit">
        </p>
    </form>
    <ul>
        <?php 
            foreach($userList as $index => $value) {
        ?>
            <li style="margin-bottom: 15px;">
                <div>User name: <?=$value['name']?></div>
                <div>Email:  <?=$value['email']?></div>
            </li>
        <?php
            }
        ?>
    </ul>
</body>
</html>