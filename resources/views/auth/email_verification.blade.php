<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Esqueceu sua Senha</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!--font-family: 'Lato', sans-serif;-->

</head>

<body>
    <table style="width:700px;height: 100%;background-color: #F5F6F8;margin:0 auto;padding:20px;">
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="20" style="width:100%;padding-bottom: 0px;background-color: #fff;">

                    <tr>
                        <td align="center" valign="top" style="">
                            <table border="0" cellpadding="20" cellspacing="0" style="width:100%;padding-bottom:0px;">
                                <tr>
                                    <td
                                        style="padding: 0 0 20px 0;font-family: 'Lato', sans-serif;font-size: 20px;text-align:center;color:#334150;font-weight: 800;">
                                        Olá,{{ $full_name }}!!
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding: 0 0 20px 0;text-align:center;color:#334150;font-family: 'Lato', sans-serif;font-size: 16px;font-weight:400;">
                                        Para completar o processo de registro, clik no botão abaixo.
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 0 20px 0;">
                                        <img src="http://codingpixeldemo.com/email-images/lock.png"
                                            style="margin: 0 auto;display: block;max-width: 20%;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 0 20px 0;">
                                        <a target="_blank" href="{{ $link }}"
                                            style="text-decoration:none;background-color: #5C7CE5;color:#fff;padding:15px 40px;font-size: 15px;font-family: 'Lato', sans-serif;font-weight:800;width: 140px;display: block;margin:0 auto;border-radius:5px;">Verify
                                            Seu E-mail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding: 20px 0 20px 0;text-align:center;color:#7F8FA4;font-family: 'Lato', sans-serif;font-size: 16px;font-weight:400;">
                                        Verifique através do link: <br />
                                        <a target="_blank" href="{{ $link }}" style="color: #249AF3;">
                                            {{ $link }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding: 20px 0 20px 0;text-align:center;color:#7F8FA4;font-family: 'Lato', sans-serif;font-size: 16px;font-weight:400;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 0 0 20px 0;text-align:center;color:#7F8FA4;font-family: 'Lato', sans-serif;font-size: 16px;font-weight:400;">
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 0 0 20px 0;text-align:center;color:#7F8FA4;font-family: 'Lato', sans-serif;font-size: 16px;font-weight:400;">
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 0 0 20px 0;text-align:center;color:#7F8FA4;font-family: 'Lato', sans-serif;font-size: 16px;font-weight:400;">
                            <a href="" style="color:#5C7CE5;font-size: 20px;padding-right: 10px;"><i
                                    class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="" style="color:#5C7CE5;font-size: 20px;padding-right: 10px;"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="" style="color:#5C7CE5;font-size: 20px;padding-right: 10px;"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="" style="color:#5C7CE5;font-size: 20px;"><i class="fa  fa-pinterest-p"
                                    aria-hidden="true"></i></a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
