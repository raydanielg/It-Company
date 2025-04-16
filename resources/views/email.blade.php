<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px;">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <img src="{{ asset('uploads/'.$global_setting->logo_sticky) }}" alt="" width="150" height="auto">
            </td>
        </tr>
        <tr>
            <td style="background-color: #ffffff; padding: 30px;">
                <p style="font-size: 16px; color: #666; margin: 20px 0;">
                    {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($body))) !!}
                </p>
            </td>
        </tr>
        <tr>
            <td style="background-color: #f4f4f4; padding: 10px; text-align: center;">
                {{ __('Copyright') }} {{ date('Y') }}. {{ env('APP_NAME') }}.
            </td>
        </tr>
    </table>
</body>
</html>