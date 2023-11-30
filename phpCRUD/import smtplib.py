import requests
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

# Fonction pour envoyer l'e-mail

def send_email(receiver_email, link):
    # Paramètres du serveur SMTP
    smtp_server = 'smtp.gmail.com'  # Serveur SMTP de Gmail
    smtp_port = 587  # Port SMTP de Gmail

    # Votre adresse e-mail Gmail et votre mot de passe
    sender_email = 'walaeddine.riahi@esprit.tn'  # Remplacez par votre adresse e-mail Gmail
    password = 'wallou12'  # Remplacez par votre mot de passe Gmail

    # Création de l'e-mail
    message = MIMEMultipart()
    message['From'] = sender_email
    message['To'] = receiver_email
    message['Subject'] = 'Lien de confirmation'

    # Corps de l'e-mail avec le lien
    body = f"Bonjour,\n\nVoici le lien de confirmation : {link}\n\nCordialement."
    message.attach(MIMEText(body, 'plain'))

    # Connexion au serveur SMTP de Gmail
    server = smtplib.SMTP(smtp_server, smtp_port)
    server.starttls()  # Démarre la connexion TLS (sécurisée)
    server.login(sender_email, password)

    # Envoi de l'e-mail
    server.sendmail(sender_email, receiver_email, message.as_string())

    # Fermeture de la connexion au serveur SMTP
    server.quit()

# Appel de la fonction send_email avec l'adresse e-mail du destinataire et le lien
dest_email = 'mohamedbadiss.boumiza@esprit.tn'  # Remplacez par l'adresse e-mail du destinataire
link_to_send = 'http://localhost/Conservatoire/phpCRUD/views/confirm_registration.php?code=conservatoire' 
send_email(dest_email, link_to_send)
