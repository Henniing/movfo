<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />
        <title>Installing MovFo</title>
        <meta name='description' content='Movfo, movie rating, trailer and torrents in one location' />
        <meta name="keywords" content="Movfo, movies, movie rating,movie trailers, movie torrents, torrents, trailers, imdbrating, imdb, imdb info" />

        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.2r1/build/reset/reset-min.css"/>
        <link href="src/public/style/jquery-ui-1.8.5.custom.css" rel="stylesheet" type="text/css" />
        <link href="installation/style/style.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>

    </head>
    <body>
        <div id="root">
            <div id="header">
                
            </div>
            <div id="content">
                <p>This is the installation process of movfo, to use movfo you need a mysql database (we are
                going to improve database support in the future). This database can either be stored localy or
                on a remote server. Under you will find a form you have to fill out with the necessary information
                about the database.</p>
                
                <div id='installation_form'>
                    <form method='POST'>
                        <table>
                            <tr><td><p>Host:</p></td><td><input type='text' name='dbhost' /></td></tr>
                            <tr><td><p>Database name:</p></td><td><input type='text' name='dbname' /></td></tr>
                            <tr><td><p>Username:</p></td><td><input type='text' name='dbuser' /></td></tr>
                            <tr><td><p>Password:</p></td><td><input type='password' name='dbpassw' /></td></tr>
                        <table>
                    </form>
                    <div id='install_button'>
                        Innstall
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
