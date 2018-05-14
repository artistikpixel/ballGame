@include('layouts.header')

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
                                <input required type="text" name="numarBile" class="form-control" value="" placeholder="Numar culori">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>

                            <div class="form-group">
                                <div id="input1" style="margin-bottom:4px;" class="clonedInput">
                                    <input required type="text" name="culoare[]" placeholder="Culoare bile" />
                                    <input required type="text" name="culoare[]" id="" placeholder="Numar bile" style="width:80px;" />
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
@include('layouts.footer')