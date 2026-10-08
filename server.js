require('dotenv').config();

const path = require('path');
const express = require('express');
const cors = require('cors');
const { getSmtpConfig, sendContactEmail } = require('./lib/mail');

const app = express();
const PORT = process.env.PORT || 3000;

app.use(cors());
app.use(express.json());

app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'index.html'));
});

const smtp = getSmtpConfig();
console.log(smtp ? 'SMTP config loaded.' : 'SMTP config is missing.');

async function handleSend(req, res) {
  try {
    await sendContactEmail(req.body);
    res.json({ success: true, message: 'Email sent successfully.' });
  } catch (error) {
    if (!error.statusCode || error.statusCode >= 500) {
      console.error('Send error:', error);
    }

    res.status(error.statusCode || 502).json({
      error: error.statusCode ? error.message : 'Failed to send email.',
    });
  }
}

app.post('/api/send', handleSend);
app.post('/send', handleSend);

app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
