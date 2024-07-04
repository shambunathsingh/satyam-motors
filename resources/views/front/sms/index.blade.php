<form id="smsForm" method="POST" action="{{ route('sms.send') }}">
    @csrf <!-- CSRF protection for Laravel -->
    <!-- Your form fields -->
    <input type="text" id="phone" name="phone" placeholder="Phone number">
    <textarea id="mssg" name="mssg" placeholder="Message"></textarea>
    <button type="submit">Send SMS</button>
</form>

<script>
    $(document).ready(function() {
        $('#smsForm').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get form data
            var formData = {
                phone: $('#phone').val(),
                mssg: $('#mssg').val()
            };

            // Send AJAX request
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log('SMS sent successfully:', response);
                    // Handle success response here
                },
                error: function(xhr, status, error) {
                    console.error('Error sending SMS:', error);
                    // Handle error response here
                }
            });
        });
    });
</script>
