document.addEventListener('DOMContentLoaded', () => {
    // Get the radio buttons, total price display, country select, and COD note
    const radios = document.querySelectorAll('input[type="radio"][name="product"]');
    const totalSpan = document.getElementById('total');
    const countrySelect = document.getElementById('country');
    const codNote = document.getElementById('cod-note');
  
    // Update the total price when a color is selected
    radios.forEach(radio => {
      radio.addEventListener('change', () => {
        // Get the price of the selected color and update the total
        const price = radio.dataset.price;
        totalSpan.textContent = price;
      });
    });
  
    // Show Cash on Delivery note only for Sri Lanka
    countrySelect.addEventListener('change', () => {
      if (countrySelect.value === 'Sri Lanka') {
        codNote.style.display = 'block'; // Show COD note
      } else {
        codNote.style.display = 'none'; // Hide COD note
      }
    });
  });
  