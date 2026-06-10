<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Enquiry | Crakers</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f9f7f2; font-family: 'Outfit', 'Helvetica Neue', Helvetica, Arial, sans-serif;">
    <div style="width: 100%; table-layout: fixed; background-color: #f9f7f2; padding: 40px 0;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 20px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.05); border: 1px solid #e5e0d5;">
            <!-- Header -->
            <tr>
                <td style="background-color: #101010; padding: 40px; text-align: center;">
                    <div style="letter-spacing: 2px; color: #B8860B; font-size: 11px; font-weight: 800; text-transform: uppercase; margin-bottom: 10px;">Internal Notification</div>
                    <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 400; font-family: 'Cormorant Garamond', Georgia, serif; letter-spacing: 1px;">New Customer <span style="color: #B8860B;">Enquiry</span></h1>
                </td>
            </tr>

            <!-- Content body -->
            <tr>
                <td style="padding: 40px;">
                    <p style="margin: 0 0 30px; font-size: 14px; color: #666; line-height: 1.6; text-align: center;">You have received a new message from the website contact form. The details are documented below.</p>
                    
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #fbfaf8; border-radius: 15px; border: 1px solid #efebe1;">
                        <tr>
                            <td style="padding: 20px; border-bottom: 1px solid #efebe1;">
                                <div style="font-size: 10px; font-weight: 800; color: #B8860B; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Sender Name</div>
                                <div style="font-size: 16px; font-weight: 700; color: #101010;">{{ $enquiry->name }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 20px; border-bottom: 1px solid #efebe1;">
                                <div style="font-size: 10px; font-weight: 800; color: #B8860B; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Electronic Mail</div>
                                <div style="font-size: 16px; font-weight: 700; color: #101010;">{{ $enquiry->email }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 20px; border-bottom: 1px solid #efebe1;">
                                <div style="font-size: 10px; font-weight: 800; color: #B8860B; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Contact Number</div>
                                <div style="font-size: 16px; font-weight: 700; color: #101010;">{{ $enquiry->phone ?? 'Not Provided' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 20px;">
                                <div style="font-size: 10px; font-weight: 800; color: #B8860B; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Enquiry Message</div>
                                <div style="font-size: 15px; font-weight: 500; color: #333; line-height: 1.8; font-style: italic;">
                                    "{!! nl2br(e($enquiry->message)) !!}"
                                </div>
                            </td>
                        </tr>
                    </table>

                    <!-- Link/Action -->
                    <div style="margin-top: 40px; text-align: center;">
                        <a href="mailto:{{ $enquiry->email }}" style="display: inline-block; padding: 15px 30px; background-color: #101010; color: #ffffff; text-decoration: none; border-radius: 10px; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; border: 1px solid #B8860B;">Reply Directly</a>
                    </div>
                </td>
            </tr>

            <!-- Footer -->
            <tr>
                <td style="padding: 30px; background-color: #fbfaf8; text-align: center; border-top: 1px solid #efebe1;">
                    <div style="font-size: 11px; color: #999; font-weight: 500;">&copy; 2026 Crakers Retail Terminal. Generated automatically.</div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
