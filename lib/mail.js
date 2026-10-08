const nodemailer = require('nodemailer');

const EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function clean(value) {
  return typeof value === 'string' ? value.trim() : '';
}

function escapeHtml(value) {
  return value
    .replaceAll('&', '&amp;')
    .replaceAll('<', '&lt;')
    .replaceAll('>', '&gt;')
    .replaceAll('"', '&quot;')
    .replaceAll("'", '&#039;');
}

function getSmtpConfig() {
  const user = process.env.SMTP_USER || process.env.GMAIL_USER;
  const pass = process.env.SMTP_PASS || process.env.GMAIL_APP_PASSWORD;
  const host = process.env.SMTP_HOST || 'smtp.gmail.com';
  const port = Number(process.env.SMTP_PORT || 465);
  const to = process.env.CONTACT_TO || user;
  const from = process.env.MAIL_FROM || user;

  if (!host || !user || !pass || !to || !from || Number.isNaN(port)) {
    return null;
  }

  return {
    host,
    port,
    secure: process.env.SMTP_SECURE === 'true' || port === 465,
    auth: { user, pass },
    to,
    from,
  };
}

function validatePayload(body) {
  const name = clean(body && body.name);
  const email = clean(body && body.email).toLowerCase();
  const message = clean(body && body.message);

  if (!name || !email || !message) {
    return { error: 'All fields are required.' };
  }

  if (!EMAIL_RE.test(email)) {
    return { error: 'Please enter a valid email address.' };
  }

  if (message.length > 5000) {
    return { error: 'Message is too long. Maximum is 5000 characters.' };
  }

  return { value: { name, email, message } };
}

async function sendContactEmail(body) {
  const validation = validatePayload(body);

  if (validation.error) {
    const error = new Error(validation.error);
    error.statusCode = 400;
    throw error;
  }

  const smtp = getSmtpConfig();

  if (!smtp) {
    const error = new Error('Email is not configured on the server.');
    error.statusCode = 500;
    throw error;
  }

  const { name, email, message } = validation.value;
  const transporter = nodemailer.createTransport({
    host: smtp.host,
    port: smtp.port,
    secure: smtp.secure,
    auth: smtp.auth,
    connectionTimeout: 10_000,
    greetingTimeout: 10_000,
    socketTimeout: 15_000,
  });

  const safeName = escapeHtml(name);
  const safeEmail = escapeHtml(email);
  const safeMessage = escapeHtml(message).replaceAll('\n', '<br />');

  await transporter.sendMail({
    from: `"Portfolio Contact" <${smtp.from}>`,
    to: smtp.to,
    replyTo: `${name} <${email}>`,
    subject: `Portfolio Message from ${name}`,
    text: [
      'New Contact Form Message',
      '',
      `Name: ${name}`,
      `Email: ${email}`,
      '',
      'Message:',
      message,
    ].join('\n'),
    html: `
      <div style="font-family:Arial,sans-serif;line-height:1.5;color:#111827;max-width:600px;margin:0 auto">
        <h2 style="color:#6366f1">New Contact Form Message</h2>
        <p><strong>Name:</strong> ${safeName}</p>
        <p><strong>Email:</strong> <a href="mailto:${safeEmail}">${safeEmail}</a></p>
        <p><strong>Message:</strong></p>
        <div style="background:#f8fafc;padding:16px;border-radius:8px;border-left:4px solid #6366f1">${safeMessage}</div>
      </div>
    `,
  });
}

module.exports = {
  getSmtpConfig,
  sendContactEmail,
};
