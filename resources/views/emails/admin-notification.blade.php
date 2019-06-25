<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <!--[if gte mso 9]><xml>
   <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
   </o:OfficeDocumentSettings>
  </xml><![endif]-->
    <!-- fix outlook zooming on 120 DPI windows devices -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
    <meta name="format-detection" content="date=no"> <!-- disable auto date linking in iOS 7-9 -->
    <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS 7-9 -->
    <title>Single Column</title>
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/email.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/email-responsive.css') }}">
</head>

<body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

    <!-- 100% background wrapper (grey background) -->
    <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
        <tr>
            <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

                <br>

                <!-- 600px container (white background) -->
                <table border="0" width="600" cellpadding="0" cellspacing="0" class="container">
                    <tr>
                        <td class="container-padding header" align="left">
                            UserManagementAPP
                        </td>
                    </tr>
                    <tr>
                        <td class="container-padding content" align="left">
                            <br>

                        <div class="title">{{$email->title}}</div>
                            <br>

                            <div class="body-text">
                                {{$email->body}}

                                <br><br>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td class="container-padding footer-text" align="left">
                            <br><br>
                            Sample Footer text: &copy; 2019 UserManagementAPP, Inc.
                            <br><br>

                            {{-- You are receiving this email because you opted in on our website. Update your <a
                                href="#">email preferences</a> or <a href="#">unsubscribe</a>.
                            <br><br> --}}

                            <strong>user.test, Inc.</strong><br>
                            <span class="ios-footer">
                                address.<br>
                                address, address<br>
                            </span>
                            <a href="http://user.test">www.user.test</a><br>

                            <br><br>

                        </td>
                    </tr>
                </table>
                <!--/600px container -->


            </td>
        </tr>
    </table>
    <!--/100% background wrapper-->

</body>

</html>
