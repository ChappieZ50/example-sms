# VatanSoft ExampleSMS

### Description
Users can create account and send sms with api request.
PHP Version: 8.1
Laravel Version: 9



# Documentation

#### Register
    Method: POST
    URL: /api/user/register

    Required Fields (*):
        name | email | password | password_confirmation

    Response JSON:
        message | token

#### Login
    Method: POST
    URL: /api/user/login

    Required Fields (*):
        email | password

    Response JSON:
        message | token

#### Send SMS
    Method: POST
    URL: /api/sms - POST

    Required Fields (*):
        number | message

    Response JSON:
        message

#### SMS List
    Method: GET
    URL: /api/sms

     Response JSON:
        number | message | send_time | readable_send_time | (Pagination)

#### Show SMS
    Method: GET
    URL: /api/sms/{id}

     Response JSON:
        number | message | send_time | readable_send_time | (Pagination)

#### Filter SMS Between Send Times
    URL: /api/sms[between_send_time]=2022-01-01,2022-12-31

    Response JSON:
    number | message | send_time | readable_send_time | (Pagination)

    

    
