<div
    style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <div style="text-align: center; padding: 10px 0;">
        <h1 style="color: #2c7bf7; font-size: 28px; margin: 0;">RetroKits Nepal</h1>
        <p style="font-size: 14px; color: #555;">Your trusted Sportswear Brand.</p>
    </div>

    <div style="background-color: #fff; padding: 20px; border-radius: 10px; margin-top: 20px;">
        <p style="font-size: 18px; color: #333; margin-bottom: 15px;">Dear {{ $name }},</p>
        <p style="font-size: 16px; color: #666; line-height: 1.6;">We are happy to let you know that your Order is now
            <strong style="color: #2c7bf7;">{{ $status }}</strong>.
            Thank you for choosing us!
        </p>
        <hr style="border: 0; border-top: 1px solid #ddd; margin: 20px 0;">

        <h3 style="color: #333; font-size: 18px; margin-bottom: 10px;">Order Details:</h3>
        <p style="font-size: 16px; color: #555; line-height: 1.6;">
            <strong>Product Name:</strong> {{ $product_name }} <br>
            <strong>Total Price:</strong> {{ $price }} <br>
            <strong>Payment Method:</strong> {{ $payment_method }}
        </p>

        <hr style="border: 0; border-top: 1px solid #ddd; margin: 20px 0;">

        <p style="font-size: 16px; color: #666; line-height: 1.6;">If you have any questions, feel free to contact our
            support team at <a href="mailto:support@yatrasathi.com"
                style="color: #2c7bf7; text-decoration: none;">support@retronepal.com</a>.</p>

        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ route('home') }}"
                style="background-color: #2c7bf7; color: #fff; padding: 10px 20px; font-size: 16px; border-radius: 5px; text-decoration: none;">Explore
                More Sportswear</a>
        </div>
    </div>



    <footer style="text-align: center; margin-top: 20px; font-size: 14px; color: #888;">
        <p>© 2024 RetroKits Nepal. All rights reserved.</p>
        <p>Follow us: <a href="" style="color: #2c7bf7; text-decoration: none;">Twitter</a> | <a href=""
                style="color: #2c7bf7; text-decoration: none;">Facebook</a></p>
    </footer>
</div>
