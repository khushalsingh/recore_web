@extends('layouts.email')
@section('email_content')
Dear <?php echo $contact_us_feed_first_name . ' ' . $contact_us_feed_last_name; ?><br><br/>
Thank you for your valuable feedback. We will get back you soon.
@endsection