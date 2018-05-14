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
<body>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="login-logo">
                        <h3>Ball Game</h3>
                    </div>
                    <div class="login-box-body">
                        <form action="{{ route('formSubmit') }}" method="post">
                            {{csrf_field()}}

                            <div class="form-group">
                                <input required type="text" name="numarBile" class="form-control" value="" placeholder="Numar cutii">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>

                            <div class="form-group">
                                <div id="input1" style="margin-bottom:4px;" class="clonedInput">
                                    <input required type="text" name="culoare[]" placeholder="" />
                                    <input required type="text" name="culoare[]" id="" placeholder="" style="width:80px;" />
                                </div>
                            </div>

                            <div>
                                <input type="button" id="btnAdd" value="Adauga un nou set de bile" />
                            </div>

                            @if ($errors->has('first_err'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_err') }}</strong>
                                </span>
                            @endif

                            <div class="form-group">
                                <div class="col-xs-4">
                                    <button name="submitForm" type="submit" class="btn btn-primary">Trimite</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>