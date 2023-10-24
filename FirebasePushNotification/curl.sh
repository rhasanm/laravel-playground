curl -X POST -H "Authorization: key=AAAAJP8zHY8:APA91bEyVlJH9Oxo0wZymoSK0rNJb-FGxOxoU-JICoM_JxQ1uXrIM7subZRoeCCO_6vliP3p3Ht6iAked9oDIngd3ceaYe-uvcabtrgiNewR9QfWLMWgit3dNEPeFjP8lBNRs6EBGkyb" -H "Content-Type: application/json" -d '{
    "notification": {
        "title": "Your Notification Title",
        "body": "Your Notification Message"
    },
    "to": "cIzzHoIzcVhftXvfm72X75:APA91bHSRHeh4_JrLO0hBK1tgpVhJ14lj0GGIzN8NMYt8PmZ8IVJ36U3RqWgox7yYVYBzDYTE9EMvkmQDnL_xzHUDnuBlnqd7vgt5DmMB5oODurCVcepfvDNNB0G5dhXkaOgTzg9ae6G"
}' https://fcm.googleapis.com/fcm/send
