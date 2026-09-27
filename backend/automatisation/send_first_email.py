import sys
import os
import smtplib
from email.message import EmailMessage
from pathlib import Path
from dotenv import load_dotenv

BASE_DIR = Path(__file__).resolve().parent.parent
RUTA_ENV = BASE_DIR / '.env'

load_dotenv(dotenv_path=RUTA_ENV)

# 1. Comprobar que hemos recibido los 7 argumentos (+1 que es el propio script = 8)
if len(sys.argv) < 8:
    print("Error: Faltan argumentos requeridos.")
    sys.exit(1)

# 2. Asignar los argumentos a variables
nombre = sys.argv[1]
email_destino = sys.argv[2]
hora = sys.argv[3]
fecha = sys.argv[4]
precio_total = sys.argv[5]
lugar = sys.argv[6]
servicios = sys.argv[7]

# 3. Datos del servidor SMTP
#* Todos estos datos se guardarán en el archivo .env
SMTP_SERVER = os.getenv("SMTP_SERVER", "smtp.gmail.com")
SMTP_PORT = int(os.getenv("SMTP_PORT", 587))
REMITENTE_EMAIL = os.getenv("REMITENTE_EMAIL")
REMITENTE_PASSWORD = os.getenv("REMITENTE_PASSWORD")  # Tu Contraseña de Aplicación

# 4. Construir la estructura del mensaje
msg = EmailMessage()
msg["Subject"] = f"Confirmación de Reserva - (Nombre de la empresa) {fecha}"
msg["From"] = REMITENTE_EMAIL
msg["To"] = email_destino

# Plantilla HTML con los datos de la reserva
cuerpo_html = f"""
<!DOCTYPE html>
<html>
<head>
    <style>
        body {{ font-family: Arial, sans-serif; color: #333; }}
        .card {{ border: 1px solid #ddd; padding: 20px; border-radius: 8px; max-width: 500px; }}
        .header {{ color: #2c3e50; border-bottom: 2px solid #2FBDA7; padding-bottom: 10px; }}
        .dato {{ margin: 10px 0; }}
        .label {{ font-weight: bold; }}
        .precio {{ font-size: 1.2em; color: #27ae60; font-weight: bold; }}
    </style>
</head>
<body>
    <div class="card">
        <h2 class="header">¡Hola {nombre}!</h2>
        <p>Tu reserva se ha completado con éxito. Aquí tienes el resumen:</p>
        
        <div class="dato"><span class="label">Fecha:</span> {fecha}</div>
        <div class="dato"><span class="label">Hora:</span> {hora}</div>
        <div class="dato"><span class="label">Lugar:</span> {lugar}</div>
        <div class="dato"><span class="label">Servicios:</span> {servicios}</div>
        <div class="dato"><span class="label">Precio por el servicios:</span> <span class="precio">{precio_total} €</span></div>
        <p>Si necesitas modificar la cita o eliminarla, puedes enviarme un whatsapp al: +34 633 37 49 25</p>
        
        <p style="margin-top:20px; font-size:0.9em; color:#777;">Gracias por confiar en nosotros.</p>
    </div>
</body>
</html>
"""

msg.set_content(f"Hola {nombre}, tu reserva para el {fecha} a las {hora} en {lugar} por un total de {precio_total}€ ha sido confirmada.") #Lo usamos en caso de que el cliente lo tenga capado los envios de correo por html
msg.add_alternative(cuerpo_html, subtype="html") # En caso de que está todo bien, usamos este tipo de envío

# 5. Enviar el correo
try:
    with smtplib.SMTP(SMTP_SERVER, SMTP_PORT) as server:
        server.starttls()
        server.login(REMITENTE_EMAIL, REMITENTE_PASSWORD)
        server.send_message(msg)
    print("Correo enviado con éxito")
except Exception as e:
    print(f"Error al enviar el correo: {e}")