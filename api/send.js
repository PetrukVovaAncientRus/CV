const { sendContactEmail } = require('../lib/mail');

module.exports = async function handler(req, res) {
  if (req.method !== 'POST') {
    res.setHeader('Allow', 'POST');
    return res.status(405).json({ error: 'Method not allowed.' });
  }

  try {
    await sendContactEmail(req.body);
    return res.status(200).json({ success: true, message: 'Email sent successfully.' });
  } catch (error) {
    if (!error.statusCode || error.statusCode >= 500) {
      console.error('Send error:', error);
    }

    return res.status(error.statusCode || 502).json({
      error: error.statusCode ? error.message : 'Failed to send email.',
    });
  }
};
