@extends('layouts.default')
@section('content')
<div id="heading-breadcrumbs">
</div>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-6">
            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success_message; ?>
                </div>
            <?php } ?>
            Redirecting to Login...
            <br/><br/>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        setTimeout(function () {
                document.location.href = base_url + 'register/employer';
        }, 5000);
    });
</script>
@endsection