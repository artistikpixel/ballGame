<!DOCTYPE html>
<html>
<head>
    <link href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" type="text/css" rel="stylesheet" media="all">
    <link href="//maxcdn.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" >
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" >
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script data-cfasync="false" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script data-cfasync="false" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script data-cfasync="false" src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnAdd').click(function() {

                var num     = $('.clonedInput').length;
                var newNum  = new Number(num + 1);
                var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
                newElem.children('input[type=text]:first');
                newElem.children('input[type=checkbox]:first').attr('id', 'chk' + newNum);

                $('#input' + num).after(newElem);
            });
        });
    </script>
</head>