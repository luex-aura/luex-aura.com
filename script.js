
document.querySelectorAll('.color-btn').forEach(button => {
  button.addEventListener('click', () => {
    document.querySelectorAll('.color-btn').forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');
    document.getElementById('color').value = button.getAttribute('data-color');
  });
});

function notifyWhatsApp() {
  const form = document.getElementById('checkout-form');
  const name = form.name.value.trim();
  const phone = form.phone.value.trim();
  const address = form.address.value.trim();
  const province = form.province.value.trim();
  const city = form.city.value.trim();
  const color = form.color.value.trim();
  const email = "luexaura90@";

  if (!color) {
    alert("Please select a product color.");
    return;
  }

  const message = `LUEX AURA Order:%0A` +
    `👤 Name: ${name}%0A` +
    `📞 Phone: ${phone}%0A` +
    `🏠 Address: ${address}, ${city}, ${province}%0A` +
    `🎨 Color: ${color}%0A` +
    `💳 Payment: Cash on Delivery%0A` +
    `📧 Email: ${email}`;

  const whatsappURL = `https://wa.me/94775211827?text=${message}`;
  window.open(whatsappURL, '_blank');
}
