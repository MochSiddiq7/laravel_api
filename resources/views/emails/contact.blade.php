<h3>{{ $details['title'] }}</h3>
<p><strong>Nama:</strong> {{ $details['name'] }}</p>
<p><strong>Email:</strong> {{ $details['email'] }}</p>
@if(!empty($details['phone']))
    <p><strong>No HP:</strong> {{ $details['phone'] }}</p>
@endif
<p><strong>Pesan:</strong><br>{{ $details['message'] }}</p>
