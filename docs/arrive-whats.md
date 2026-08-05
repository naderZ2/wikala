# Arrive Whats deployment

1. Deploy the application changes.
2. Run:

   ```bash
   php artisan migrate
   ```

3. Open **Admin → Settings → Arrive Whats Settings**.
4. Enter a newly generated API token, the API base URL, and the default
   country calling code. The optional receipt phone receives invoice/payment
   messages; when it is blank, the customer's phone is used.

The token is encrypted in the database and is never displayed again. Leaving
the token field blank preserves the saved token; use the explicit removal
checkbox to delete it.

Environment variables are optional fallbacks:

```dotenv
ARRIVE_WHATS_BASE_URL=https://arrivewhats.com/api
ARRIVE_WHATS_TOKEN=
ARRIVE_WHATS_DEFAULT_COUNTRY_CODE=965
ARRIVE_WHATS_RECEIPT_PHONE=
ARRIVE_WHATS_CONNECT_TIMEOUT=5
ARRIVE_WHATS_TIMEOUT=15
OTP_EXPIRY_MINUTES=5
```

Do not reuse a token that has appeared in chat, logs, screenshots, or source
control.

## Client compatibility

Phone auth endpoints accept `country_code` alongside the local `phone`, for
example:

```json
{
  "phone": "01012345678",
  "country_code": "20"
}
```

The server stores and sends `201012345678`. A phone already supplied as
`+201012345678` or `00201012345678` remains international.

OTP send responses no longer expose the OTP. Their safe result is:

```json
{
  "channel": "whatsapp",
  "expires_in": 300
}
```
